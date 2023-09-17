<?php
    require_once realpath(__DIR__ . '/../../../vendor/autoload.php');
    require_once realpath(__DIR__ . '/../model/itemCountModel.php');
    use Monolog\Level;
	use Monolog\Logger;
	use Monolog\Handler\StreamHandler;

    class GetItemCountController {
        private $logger;

        public function __construct() {
            $this->logger = new Logger(basename(__FILE__));
            $this->logger->pushHandler(new StreamHandler("php://stdout"));
        }

        public function getProductTypeCount() {
            try {
                $itemCountModel = new ItemCountModel();
                $productTypeCount = $itemCountModel->getProductTypeCount();

                $response["success"] = true;
                $response["itemCount"] = $productTypeCount;
                $this->logger->info("Process successful.\n Response: " . json_encode($response));
            } catch (Exception $e) {
                $errorCode = $e->getCode();
                $errorMessage = $e->getMessage();
                $stackTrace = $e->getTraceAsString();
                $this->logger->error("ERROR (Code: $errorCode): $errorMessage\n$stackTrace");
                $response["success"] = false;
                $response["error"] = "An error occurred. Please check the logs for more information.";
            }
            return json_encode($response);
        }

        public function getProductStockCount() {
            try {
                $itemCountModel = new ItemCountModel();
                $productStockCount = $itemCountModel->getProductStockCount();

                $response["success"] = true;
                $response["itemStockCount"] = $productStockCount;
                $this->logger->info("Process successful.\n Response: " . json_encode($response));
            } catch (Exception $e) {
                $errorCode = $e->getCode();
                $errorMessage = $e->getMessage();
                $stackTrace = $e->getTraceAsString();
                $this->logger->error("ERROR (Code: $errorCode): $errorMessage\n$stackTrace");
                $response["success"] = false;
                $response["error"] = "An error occurred. Please check the logs for more information.";
            }
            return json_encode($response);
        }

        public function getOverallProductSoldCount() {
            try {
                $itemCountModel = new ItemCountModel();
                $overallProductSoldCount = $itemCountModel->getOverallProductSoldCount();

                $response["success"] = true;
                $response["itemOverallSoldCount"] = $overallProductSoldCount;
                $this->logger->info("Process successful.\n Response: " . json_encode($response));
            } catch (Exception $e)  {
                $errorCode = $e->getCoode();
                $errorMessage = $e->getMessage();
                $stackTrace = $e->getTraceAsString();
                $this->logger->error("ERROR (Code: $errorCode): $errorMessage\n$stackTrace");
                $response["success"] = false;
                $response["error"] = "An error occurred. Please check the logs for more information.";
            }
            return json_encode($response);
        }

        public function getCurrentWeekProductSoldCount() {
            try {
                $itemCountModel = new ItemCountModel();
                $weeklyProductSoldCount = $itemCountModel->getCurrentWeekProductSoldCount();

                $response["success"] = true;
                $response["itemWeeklySoldCount"] = $weeklyProductSoldCount;
                $this->logger->info("Process successful.\n Response: " . json_encode($response));
            } catch (Exception $e) {
                $errorCode = $e->getCode();
                $errorMessage = $e->getMessage();
                $stackTrace = $e->getTraceAsString();
                $this->logger->error("ERROR (Code: $errorCode): $errorMessage".PHP_EOL."$stackTrace");
                $response["success"] = false;
                $response["error"] = "An error occurred. Please check the logs for more information.";
            }
            return json_encode($response);
        }

        public function getCurrentYearMonthlyProductSoldCount(int $year = null) {
            try {
                if (is_null($year)) {
                    $year = date("Y");
                }
                $itemCountModel = new ItemCountModel();
                $perMonthCurrYrSoldCount = $itemCountModel->getCurrentYearProductSoldCount($year);
                $response["success"] = true;
                $response["year"] = $year;
                $response["perMonthSoldCount"] = $perMonthCurrYrSoldCount;
                $this->logger->info("Process successful.".PHP_EOL."Response: ".PHP_EOL.json_encode($response));
            } catch (Exception $e) {
                $errorCode = $e->getCode();
                $errorMessage = $e->getMessage();
                $stackTrace = $e->getTraceAsString();
                $this->logger->error("ERROR (Code: $errorCode): $errorMessage".PHP_EOL."$stackTrace");
                $response["success"] = false;
                $response["error"] = "An error occurred. Please check the logs for more information.";
            }
            return json_encode($response, JSON_PRETTY_PRINT);
        }

        public function getCurrentYearPurchasesCount(int $year = null) {
            try {
                if (is_null($year)) {
                    $year = date("Y");
                }
                $itemCountModel = new ItemCountModel();
                $currYearPurchasesCount = $itemCountModel->getCurrentYearPurchasesCount($year);
                $response["success"] = true;
                $response["year"] = $year;
                $response["monthlyPurchaseCount"] = $currYearPurchasesCount;
                $this->logger->info("Process successful.".PHP_EOL."Respons$(document).ready(function() {
    function updateAreaChart() {
        const date = new Date();
        $.when(
            $.ajax({
                url: 'model/dashboard/getItemSoldCountperMonth.php',
                method: 'GET'
            }),
            $.ajax({
                url: 'model/dashboard/getPurchasesAnalytics.php',
                method: 'GET',
                data: {
                    year: date.getFullYear()
                }
            })
        ).done((salesResponse, purchasesResponse) => {
            try {
                const jsonSalesResponse = JSON.parse(salesResponse);
                const jsonPurchasesResponse = JSON.parse(purchasesResponse);

                console.log(`Sales Result: ${jsonSalesResponse}`);
                console.log(`Purchases Result: ${jsonPurchasesResponse}`);

                const month = jsonSalesResponse.perMonthSoldCount.map(item => item.monthName);
                const salesData = jsonSalesResponse.perMonthSoldCount.map(item => item.itemsSold);
                const purchasesData = jsonPurchasesResponse.monthlyPurchaseCount.map(item => item.monthName);

                areaChartPurchaseNSales.updateSeries([{name: salesOrdersChartName, data: itemsSoldData}], true);
                areaChartPurchaseNSales.updateSeries([{name: purchaseOrdersChartName, data: purchasesData}], true);

                areaChartPurchaseNSales.updateOptions({
                    xaxis: {
                        categories: month
                    }
                });

            } catch (error) {
                console.log(`Error fetching JSON data: ${error}`);
            }
        });
    }

    var areaChartPurchaseNSales = new ApexCharts(
        document.querySelector('#area-chart'),
        areaChartOptionsPurchaseNSales
    );

    updateAreaChart();
    areaChartPurchaseNSales.render();
});e: ".PHP_EOL.json_encode($response));
            } catch (Exception $e) {
                $errorCode = $e->getCode();
                $errorMessage = $e->getMessage();
                $stackTrace = $e->getTraceAsString();
                $this->logger->error("ERROR (Code: $errorCode): $errorMessage".PHP_EOL."$stackTrace");
                $response["success"] = false;
                $response["error"] = "An error occurred. Please check the logs for more information.";
            }
            return json_encode($response, JSON_PRETTY_PRINT);
        }
    }
?>