<?php
    require_once (__DIR__ . '/../../../inc/config/db.php');
    class ItemCountModel {
        private $conn;

        public function __construct() {
            global $conn;
            $this->conn = $conn;
        }

        public function getProductTypeCount() {
            $itemListQuery = "SELECT COUNT(*) as item_count FROM item where status = 'Active'";

            $itemListStatement = $this->conn->prepare($itemListQuery);
            $itemListStatement->execute();

            $result = $itemListStatement->fetch(PDO::FETCH_ASSOC);
            if ($result !== false && isset($result['item_count'])) {
                return $result['item_count'];
            } else {
                return 0;
            }
        }

        public function getProductStockCount() {
            $query = "SELECT SUM(stock) as item_stock_count FROM item where status = 'Active'";
            $sqlItemStockCountStatement = $this->conn->prepare($query);
            $sqlItemStockCountStatement->execute();

            $result = $sqlItemStockCountStatement->fetch(PDO::FETCH_ASSOC);
            if ($result !== false && isset($result['item_stock_count'])) {
                return $result['item_stock_count'];
            } else {
                return 0;
            }
        }

        /**
         * Get the overall count of products sold.
         * @return int Number of items sold from from sales table from the start to the latest sold date.
         */
        public function getOverallProductSoldCount() {
            $query = "SELECT SUM(quantity) as item_sold_count FROM sale";
            $sqlStatement = $this->conn->prepare($query);
            $sqlStatement->execute();

            $result = $sqlStatement->fetch(PDO::FETCH_ASSOC);
            if ($result !== false && isset($result['item_sold_count'])) {
                return $result['item_sold_count'];
            } else {
                return 0;
            }
        }

        /**
         * Get the current week's count of products sold.
         * @return int Number of items sold within this week.
         */
        public function getCurrentWeekProductSoldCount() {
            $query = "SELECT SUM(quantity) as weekly_sold_count FROM sale WHERE YEARWEEK(saleDate) = YEARWEEK(NOW())";
            $sqlStatement = $this->conn->prepare($query);
            $sqlStatement->execute();

            $result = $sqlStatement->fetch(PDO::FETCH_ASSOC);
            if ($result !== false && isset($result['weekly_sold_count'])) {
                return $result['weekly_sold_count'];
            } else {
                return 0;
            }
        }

        public function getCurrentYearProductSoldCount(int $year) {
            $query = <<<QUERY
            SELECT
            MONTH(saleDate) AS month,
            SUM(quantity) AS itemsSold
            FROM
                sale
            WHERE
                YEAR(saleDate) = :year
            GROUP BY
                YEAR(saleDate),
                MONTH(saleDate)
            ORDER BY
                YEAR(saleDate),
                MONTH(saleDate);
            QUERY;
            $sqlStatement = $this->conn->prepare($query);
            $sqlStatement->bindParam(':year', $year, PDO::PARAM_INT);
            $sqlStatement->execute();

            $result = $sqlStatement->fetchAll(PDO::FETCH_ASSOC);
            if (is_array($result)) {
                return $result;
            } else {
                return [];
            }
        }
    }
?>