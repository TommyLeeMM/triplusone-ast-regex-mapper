<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 04/12/2017
 * Time: 18:40
 */

include_once 'bootstrap.php';

\lib\Helper::startTime();

if(isset($_POST['insert'])) {
    (new \lib\DummyDataGenerator())->insertDummyData();
}
else if(isset($_POST['transverse'])) {
    $parser = new \lib\Parser();
    $result = $parser->parse('sample_malwares');

    $mapper = new \lib\AstRegexMapper();

    $traverser = new \PhpParser\NodeTraverser();
    $traverser->addVisitor($mapper);

    foreach($result as $filename => $ast) {
        $traverser->traverse($ast);
        \lib\Helper::prettyVarDump($filename);
        \lib\Helper::prettyVarDump($mapper->getRegexes());
    }
}
else if(isset($_POST['classify'])) {
    $classifier = new \lib\NaiveBayesClassifier();

    // dataset 1
    $data = array();
    $data['E2'] = 1;
    $data['E4'] = 1;
    $data['E5'] = 1;
    $data['E3'] = 1;
    $data['D14'] = 1;
    $data['D19'] = 1;
    $data['D10'] = 1;
    $data['D5'] = 1;
    $data['D11'] = 1;
    $data['D13'] = 1;
    $data['H5'] = 1;
    $data['H6'] = 1;
    $data['H3'] = 1;
    $result = $classifier->classify($data);

    // dataset 2
    $data = array();
    $data['F10'] = 1;
    $data['B9'] = 1;
    $data['B10'] = 1;
    $data['B11'] = 1;
    $data['B12'] = 1;
    $data['B13'] = 1;
    $data['B14'] = 1;
    $data['D14'] = 1;
    $data['D19'] = 1;
    $data['D10'] = 1;
    $data['D5'] = 1;
    $data['D11'] = 1;
    $data['D13'] = 1;
    $result = $classifier->classify($data);

}
?>

<form method="post">
    <input type="hidden" name="insert">
    <button type="submit">Insert Database</button>
</form>
<form method="post">
    <input type="hidden" name="transverse">
    <button type="submit">Transverse Node</button>
</form>
<form method="post">
    <input type="hidden" name="classify">
    <button type="submit">Classify (dummy data)</button>
</form>

<?php
\lib\Helper::stop();
?>