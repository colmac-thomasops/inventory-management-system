<?php
    require_once (__DIR__ . '/controller/getItemCountController.php');
    $controller = new GetItemCountController();
    $response = $controller->getOverallProductSoldCount();
    echo $response;
?>