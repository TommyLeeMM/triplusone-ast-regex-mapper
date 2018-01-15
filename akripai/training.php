<?php

include_once 'partials/_header.php';

$message = '';
$parser = new \lib\Parser();
$mapper = new \lib\AstRegexMapper();
$traverser = new \PhpParser\NodeTraverser();
$traverser->addVisitor($mapper);
$trainer = new \lib\Trainer();

if (isset($_POST['trainPositive'])) {
    $regexes = array();
    $result = $parser->parse($_POST['trainPositive']);
    foreach($result as $filename => $ast) {
        $traverser->traverse($ast);
        $regexes[$filename] = $mapper->getRegexes();
    }
    $trainer->train($regexes, 'Y');
    $message = 'Training Success';
}
else if(isset($_POST['trainNegative'])) {
    $regexes = array();
    $result = $parser->parse($_POST['trainNegative']);
    foreach($result as $filename => $ast) {
        $traverser->traverse($ast);
        $regexes[$filename] = $mapper->getRegexes();
    }
    $trainer->train($regexes, 'N');
    $message = 'Training Success';
}
?>

<div class="container" style="margin-top:60px">
    <form method="post">
        <h3>Training</h3>
        <div class="form-group">
            <label for="txtTrainPositive">Target Folder / File (Positive / Malware)</label>
            <div class="input-group">
                <input type="text" name="trainPositive" id="txtTrainPositive" class="form-control" required>
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary">Train</button>
               </span>
            </div>
        </div>

    </form>

    <form method="post">
        <div class="form-group">
            <label for="txtTrainNegative">Target Folder / File (Negative / Non-Malware)</label>
            <div class="input-group">
                <input type="text" name="trainNegative" id="txtTrainNegative" class="form-control" required>
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary">Train</button>
               </span>
            </div>
        </div>
    </form>

    <?php
    if($message !== '') {
        ?>
        <div class="alert alert-success">
            <?= $message ?>
        </div>
    <?php } ?>
</div>
<?php
include_once 'partials/_footer.php';
?>
