var salesOrdersChartName = 'Sales Orders';
var purchaseOrdersChartName = 'Purchase Orders';

var areaChartOptionsPurchaseNSales = {
    chart: {
        type: 'area',
        background: 'transparent',
        height: 350,
        stacked: false,
        toolbar: {
            show: false
        }
    },
    series: [
        {
            name: salesOrdersChartName,
            data: []
        }
    ],
    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
    dataLabels: {
        enabled: false
    }
}

var areaChartPurchaseNSales = new ApexCharts(
    document.querySelector('#area-chart'),
    areaChartOptionsPurchaseNSales
)
areaChartPurchaseNSales.render();

function updateAreaChart() {
    $.ajax({
        url: 'model/dashboard/getItemWeeklySoldCount.php',
        method: 'GET',
        success: function(response) {
            try {
                const jsonResponse = JSON.parse(response);
                console.log(jsonResponse);
                areaChartPurchaseNSales.updateSeries([{name: salesOrdersChartName, data: jsonResponse.itemsSold}], true);

            } catch (error) {
                console.log(`Error fetching JSON data: ${error}`);
            }
        }
    });
}