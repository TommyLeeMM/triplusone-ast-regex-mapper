<?php
/**
 * Created by PhpStorm.
 * User: MM
 * Date: 18-Oct-17
 * Time: 15:12
 */

    ### connect to mongodb
//    $m = new MongoClient();
//    echo "Connection to Database Successfully<br/>";
//
//    ### select a database
//    $db = $m->triplusone;
//    echo "Database triplusone selected<br/>";
//
//    ### select collection
//    $collection = $db->test;

    ### insert data
//    $document = array("name"=>"Tengku","age"=>28);
//    $collection->insert($document);
//    echo "Insert success<br/>";

    ### show data
//    $cursor = $collection->find();
//    foreach ($cursor as $document){
//        echo "<pre>";
//        print_r($document);
//        echo "</pre>";
//    }

require_once 'kv_custom/Mongo.php';

$mongo = new \kv_custom\Mongo();

//$mongo->insertPath(array("path" => "1 2 3 4 5 6 7 9 10 13 20"));
foreach ($mongo->showPath() as $document)
{
    echo $document['path'].'<br/>';
}

//$mongo->deleteAll();
?>