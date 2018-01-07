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
    $manager = \lib\DatabaseManager::getInstance();
    $manager->insertDummyData();
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
?>

<form method="post">
    <input type="hidden" name="insert">
    <button type="submit">Insert Database</button>
</form>
<form method="post">
    <input type="hidden" name="transverse">
    <button type="submit">Transverse Node</button>
</form>

<?php
\lib\Helper::stop();
?>