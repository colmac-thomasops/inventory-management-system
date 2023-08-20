<?php
    require_once (__DIR__ . '/controller/getVendorsController.php');
    $controller = new GetVendorsController();
    $response = $controller->getActiveVendorCount();

    echo $response;
?>