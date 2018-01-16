<?php

include_once 'partials/_header.php';

$message = array();
$parser = new \lib\Parser();
$mapper = new \lib\AstRegexMapper();
$traverser = new \PhpParser\NodeTraverser();
$traverser->addVisitor($mapper);
$trainer = new \lib\Trainer();

if (isset($_POST['trainPositive'])) {
    $targetPath = trim($_POST['trainPositive']);
    if ($targetPath !== '') {
        $regexes = array();
        $result = $parser->parse($targetPath);
        foreach ($result as $filename => $ast) {
            $traverser->traverse($ast);
            $regexes[$filename] = $mapper->getRegexes();
        }
        $trainer->train($regexes, 'Y');
        $message['message'] = 'Training Success';
        $message['isSuccess'] = true;
    } else {
        $message['message'] = 'Input can\'t be empty';
        $message['isSuccess'] = false;
    }
} else if (isset($_POST['trainNegative'])) {
    $targetPath = trim($_POST['trainNegative']);
    if ($targetPath !== '') {
        $regexes = array();
        $result = $parser->parse($_POST['trainNegative']);
        foreach ($result as $filename => $ast) {
            $traverser->traverse($ast);
            $regexes[$filename] = $mapper->getRegexes();
        }
        $trainer->train($regexes, 'N');
        $message['message'] = 'Training Success';
        $message['isSuccess'] = true;
    } else {
        $message['message'] = 'Input can\'t be empty';
        $message['isSuccess'] = false;
    }
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
    if (count($message) !== 0) {
        if ($message['isSuccess']) {
            ?>
            <div class="alert alert-success">
                <?= $message['message'] ?>
            </div>
            <?php
        } else {
            ?>
            <div class="alert alert-warning">
                <?= $message['message'] ?>
            </div>
            <?php
        }
        ?>

    <?php } ?>
</div>
<?php
include_once 'partials/_footer.php';
?>
