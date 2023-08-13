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
                $response["itemWeeklySoldCount"] = $overallProductSoldCount;
                $this->logger->info("Process successful.\n Response: " . json_encode($response));
            } catch (Exception $e) {
                $errorCode = $e->getCoode();
                $errorMessage = $e->getMessage();
                $stackTrace = $e->getTraceAsString();
                $this->logger->error("ERROR (Code: $errorCode): $errorMessage\n$stackTrace");
                $response["success"] = false;
                $response["error"] = "An error occurred. Please check the logs for more information.";
            }
            return json_encode($response);
        }
    }
?>