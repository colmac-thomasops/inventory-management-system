var areaChartOptionsPurchaseNSales = {
    chart: {
        type: 'area',
        background: 'transparent',
        height: 350,
        stacked: false,
        toolbar: {
            show: false
        },
        series: [
            {
                name: 'Sales Orders',
                data: []
            }
        ],
        dataLabels: {
            enabled: false
        }
    }
}

var areaChartPurchaseNSales = new ApexCharts(
    document.querySelector(),
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
                areaChartPurchaseNSales.updateSeries([{data: jsonResponse.itemsSold}]);

            } catch (error) {
                console.log(`Error fetching JSON data: ${error}`);
            }
        }
    });
}