<?php
    include_once 'partials/_header.php';

    $dbManager = \lib\DatabaseManager::getInstance();

    if(!empty($_POST)) {
        $bulkWriter = new \MongoDB\Driver\BulkWrite();
        $bulkWriter->update([], [
            'sender' => $_POST['sender'],
            'intervalDays' => $_POST['interval'],
            'timeExecution' => $_POST['timeExecution'],
            'path' => $_POST['path']
        ]);
        $dbManager->executeBulkWrite(\lib\DatabaseManager::SETTING_COLLECTION, $bulkWriter);
    }

    $query = new \MongoDB\Driver\Query([]);
    $cursor = $dbManager->executeQuery(\lib\DatabaseManager::SETTING_COLLECTION, $query);
    if($cursor !== null) {
        $cursor->setTypeMap([
            'root' => 'array',
            'document' => 'array',
            'array' => 'array'
        ]);
        $cursorArray = $cursor->toArray();
    }
?>

<div class="container">
    <form method="post">
        <h3>E-mail</h3>
        <div class="form-group">
            <label for="txtSender">Sender E-mail</label>
            <input type="text" name="sender" id="txtSender" class="form-control" value="<?= isset($cursorArray[0]) ? $cursorArray[0]['sender'] : '' ?>">
        </div>

        <h3>Automatic Scan</h3>
        <div class="form-group">
            <label for="txtInterval">Interval Modified Days</label>
            <input type="number" name="interval" id="txtInterval" class="form-control" value="<?= isset($cursorArray[0]) ? $cursorArray[0]['intervalDays'] : '' ?>">
        </div>
        <div class="form-group">
            <label for="txtTime">Time Execution</label>
            <div class="input-group clockpicker" data-placement="bottom" data-align="top" data-autoclose="true">
                <input type="text" name="timeExecution" class="form-control" value="<?= isset($cursorArray[0]) ? $cursorArray[0]['timeExecution'] : '00:00' ?>">
                <span class="input-group-addon">
                <span class="glyphicon glyphicon-time"></span>
            </span>
            </div>
            <script type="text/javascript">
                $('.clockpicker').clockpicker();
            </script>
        </div>
        <div class="form-group">
            <label for="txtPath">Folder Path</label>
            <input type="text" name="path" id="txtPath" class="form-control" value="<?= isset($cursorArray[0]) ? $cursorArray[0]['path'] : '' ?>">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
    <a href="index.php" class="btn btn-info">Back to Index</a>
</div>

<?php
    include_once 'partials/_footer.php';
?>