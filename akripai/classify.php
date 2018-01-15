<?php

include_once 'partials/_header.php';

$message = '';
$parser = new \lib\Parser();
$mapper = new \lib\AstRegexMapper();
$traverser = new \PhpParser\NodeTraverser();
$traverser->addVisitor($mapper);
$trainer = new \lib\Trainer();

if(isset($_POST['classify'])) {
    $regexes = array();
    $classifier = new \lib\NaiveBayesClassifier();
    $result = $parser->parse($_POST['classify']);
    foreach($result as $filename => $ast) {
        $traverser->traverse($ast);
        $regexes[$filename] = $mapper->getRegexes();
    }
    $thresholdValues = $classifier->classify($regexes);
}
?>

<div class="container" style="margin-top:60px">

    <form method="post">
        <h3>Classify</h3>
        <div class="form-group">
            <label for="txtClassifyTarget">Target Folder / File</label>
            <input type="text" name="classify" id="txtClassifyTarget" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="txtTime">Last Modified Date</label>
            <div class="input-group datepicker">
                <input type="text" name="timeExecution" class="form-control">
                <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
            </span>
            </div>
            <script type="text/javascript">
                $('.datepicker').datetimepicker({
                    format: 'L'
                });
            </script>
        </div>
        <button type="submit" class="btn btn-primary">Classify</button>
    </form>
    <?php
    if(isset($_POST['classify'])) {
        \lib\Helper::prettyVarDump($thresholdValues);
    }
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
