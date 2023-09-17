<?php
    require_once (__DIR__ . '/controller/getItemCountController.php');

    $year = null;

    if (isset($_GET['year']) && is_numeric($_GET['year'])) {
        $year = intval($_GET['year']);
    }

    $controller = new GetItemCountController();
    $response = $controller->getCurrentYearPurchasesCount($year);

    echo $response;

?>