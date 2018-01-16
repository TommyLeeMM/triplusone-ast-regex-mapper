<?php

include_once 'partials/_header.php';

$dbManager = \lib\DatabaseManager::getInstance();
$query = new \MongoDB\Driver\Query([]);
$cursor = $dbManager->executeQuery(\lib\DatabaseManager::DATA_COLLECTION, $query);
$cursor->setTypeMap([
    'root' => 'array',
    'document' => 'array',
    'array' => 'array'
]);
$cursorArray = $cursor->toArray();
?>

<div class="container" style="margin-top:60px">
    <div class="row">
        <div class="col-md-6">
            <h3>Trained File</h3>
            <div  height="350px" width="350px">
                <canvas id="trainedFileChart"></canvas>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var trainedFileChartCtx = document.getElementById('trainedFileChart').getContext('2d');
    var chart = new Chart(trainedFileChartCtx, {
        type: 'bar',
        data: {
            labels: ['malware', 'non-malware'],
            datasets: [{
                label: 'Total Files',
                data: [<?= $cursorArray[0]['positiveFileCount'] ?>,<?= $cursorArray[0]['negativeFileCount'] ?>],
                backgroundColor: ['#f00', '#0f0'],
                borderColor: ['#f00', '#0f0'],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
</script>
<?php

include_once 'partials/_footer.php';
?>
