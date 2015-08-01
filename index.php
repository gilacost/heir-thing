<?php
use Api\Api;
try{

    $family = require __DIR__ . '/app/bootstrap.php';
    $api = new Api();
//    var_dump(splitIntIntoArrayNoFloats(100000,3));
//    die;
    $heirName = 'alonsoPare2';
    $heritageByName = $api->getHeritageByName(
        $heirName,
        $family,
        DateTime::createFromFormat('j-M-Y', '20-Jan-2055')
    );
    $api->printResults($heirName,$heritageByName,$family);
}catch(Exception $e){
    echo 'Error:' . $e->getMessage();
}
