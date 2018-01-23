<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 23/01/2018
 * Time: 11:12
 */

namespace lib;


use MongoDB\Driver\Query;
use PHPMailer\PHPMailer\PHPMailer;

class MailService
{
    private $phpMailer;

    public function __construct()
    {
        $this->prepare();
    }

    private function getSender() {
        $cursor = DatabaseManager::getInstance()->executeQuery(DatabaseManager::SETTING_COLLECTION, new Query([]));
        $cursor->setTypeMap([
            'root' => 'array',
            'document' => 'array',
            'array' => 'array',
        ]);
        return $cursor->toArray()[0]['sender'];
    }

    private function prepare() {
        $this->phpMailer = new PHPMailer();
        $this->phpMailer->isSMTP();
        $this->phpMailer->Host = 'smtp.gmail.com';
        $this->phpMailer->Port = 587;
        $this->phpMailer->SMTPSecure = 'tls';
        $this->phpMailer->SMTPAuth = true;
        $this->phpMailer->Username = 'slcdatabaseadm@gmail.com';
        $this->phpMailer->Password = 'PASSWORD';
//        $this->phpMailer->SMTPDebug = 2;
        $this->phpMailer->setFrom($this->getSender());
        $this->phpMailer->isHTML(true);
    }

    public function send($to, $subject, $message) {
        $this->phpMailer->addAddress($to);
        $this->phpMailer->Subject = $subject;
        $this->phpMailer->Body = $message;
        $sendStatus = $this->phpMailer->send();
        if($sendStatus) return true;
        return $this->phpMailer->ErrorInfo;
    }
}