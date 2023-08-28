<!-- START: Dashboard Component -->
<link rel="stylesheet" type="text/css" href="../../assets/css/dashboard.custom.css">
<!-- ApexCharts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.5/apexcharts.min.js"></script>
<script src="../../assets/js/utils/utilities.js"></script>
<script src="../../assets/js/dashboardRefresh.js"></script>
<script src="../../assets/js/dashboardCharts.js"></script>

<div class="tab-pane fade" id="v-pills-dashboard" role="tabpanel" aria-labelledby="v-pills-dashboard-tab">
    <main class="main-container">
    <div class="main-title">
        <h2>DASHBOARD</h2>
    </div>

    <!-- START: KPI Cards -->
    <div class="main-cards">
        <div class="card-kpi">
            <div class="card-kpi-inner">
                <h3>PRODUCT TYPES</h3>
                <span class="material-icons-outlined">inventory_2</span>
            </div>
            <h1 id="itemCountContainer">
        </div>

        <div class="card-kpi">
            <div class="card-kpi-inner">
                <h3>SUPPLY COUNT</h3>
                <span class="material-icons-outlined">category</span>
            </div>
            <h1 id="itemSupplyCountContainer">
        </div>

        <div class="card-kpi">
            <div class="card-kpi-inner">
              <h3>ACTIVE VENDORS</h3>
              <span class="material-icons-outlined">person</span>
            </div>
            <h1 id="activeVendorCountContainer">
        </div>

        <div class="card-kpi">
            <div class="card-kpi-inner">
              <h3>TOTAL PRODUCTS SOLD</h3>
              <span class="material-icons-outlined">shopping_bag</span>
            </div>
            <h1 id="soldTotalProductsContainer">
        </div>

        <div class="card-kpi">
                <div class="card-kpi-inner">
              <h3>ALERTS</h3>
              <span class="material-icons-outlined">notification_important</span>
            </div>
            <h1>0</h1>
        </div>
    </div>
    <!-- END: KPI Cards -->

    <div class="charts-kpi">
        <div class="charts-kpi-card">
            <h2 class="chart-kpi-title">Purchase and Sales Orders</h2>
            <div id="area-chart"></div>
        </div>
    </div>
</div>
</main>
<!-- END: Dashboard Component -->