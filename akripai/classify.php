<?php

include_once 'partials/_header.php';

$message = array();
$parser = new \lib\Parser();
$mapper = new \lib\AstRegexMapper();
$traverser = new \PhpParser\NodeTraverser();
$traverser->addVisitor($mapper);
$trainer = new \lib\Trainer();

if (isset($_POST['classify']) && isset($_POST['lastModifiedDate'])) {
    $regexes = array();
    $classifier = new \lib\NaiveBayesClassifier();

    $targetPath = trim($_POST['classify']);
    $lastModifiedDate = trim($_POST['lastModifiedDate']);

    if ($targetPath !== '' && $lastModifiedDate !== '') {
        $result = $parser->parse($targetPath, $lastModifiedDate);
        foreach ($result as $filename => $ast) {
            $traverser->traverse($ast);
            $regexes[$filename] = $mapper->getRegexes();
        }
        $thresholdValues = $classifier->classify($regexes);
    } else {
        $message['message'] = 'Inputs can\'t be empty';
        $message['isSuccess'] = false;
    }
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
                <input type="text" name="lastModifiedDate" class="form-control" required>
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
    if (isset($_POST['classify']) && isset($thresholdValues)) {
        ?>
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Filename</th>
                <th>Score</th>
                <th>Result</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($thresholdValues as $filename => $thresholdValue) {
                ?>
                <tr>
                    <td><?= $filename ?></td>
                    <td>
                        <div>Positive: <?= $thresholdValue['positiveValue'] ?></div>
                        <div>Negative: <?= $thresholdValue['negativeValue'] ?></div>
                    </td>
                    <?php
                    if ($thresholdValue['positiveValue'] >= $thresholdValue['negativeValue']) {
                        ?>
                        <td class="bg-danger">Malware</td>
                        <?php
                    }
                    else {
                        ?>
                        <td class="bg-success">Non-Malware</td>
                        <?php
                    }
                    ?>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <?php
    }
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
