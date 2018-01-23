<?php

    include_once 'bootstrap.php';

    $dbManager = \lib\DatabaseManager::getInstance();
    $cursor = $dbManager->executeQuery(\lib\DatabaseManager::SETTING_COLLECTION, new \MongoDB\Driver\Query([]));
    $cursor->setTypeMap([
        'document' => 'array',
        'root' => 'array',
        'array' => 'array'
    ]);
    $settings = $cursor->toArray();

    $regexes = array();
    $parser = new \lib\Parser();
    $mapper = new \lib\AstRegexMapper();
    $traverser = new \PhpParser\NodeTraverser();
    $traverser->addVisitor($mapper);
    $classifier = new \lib\NaiveBayesClassifier();

    $startTime = date('Y-m-d H:i:s');
    $maxScannedDate = strtotime($startTime.'-'.$settings[0]['intervalDays'].' days');

    $result = $parser->parse($settings[0]['path'], date('Y-m-d', $maxScannedDate));
    foreach ($result as $filename => $ast) {
        $traverser->traverse($ast);
        $regexes[$filename] = $mapper->getRegexes();
    }
    $thresholdValues = $classifier->classify($regexes);

    $malwareFiles = array();
    foreach($thresholdValues as $filename => $thresholdValue) {
        if ($thresholdValue['positiveValue'] > $thresholdValue['negativeValue']) {
            $malwareFiles[] = [
                'filename' => $filename,
                'value' => ($thresholdValue['positiveValue'] / (array_sum($thresholdValue)) * 100)
            ];
        }
    }

    $mailer = new \lib\MailService();
    $today = date('Y-m-d');
    $message = '<h2>Report '.$today.'</h2>';
    foreach($malwareFiles as $malwareFile) {
        $message .= $malwareFile['filename'].' malware possibility level: '.$malwareFile['value'].'<br/>';
    }
    $res = $mailer->send($settings[0]['sender'], 'Scanner Report '.$today, $message);
    \lib\Helper::prettyVarDump($res);