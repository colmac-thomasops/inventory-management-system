const  {getMonthName} = require('./utils/utilities');

var salesOrdersChartName = 'Sales Orders';
var purchaseOrdersChartName = 'Purchase Orders';
var monthsXAxis = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug"];

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
        },
        {
            name: purchaseOrdersChartName,
            data: []
        }
    ],
    xaxis: {
        categories: monthsXAxis
    },
    dataLabels: {
        enabled: false
    },
    fill: {
        type: "gradient",
        gradient: {
          shadeIntensity: 1,
          opacityFrom: 0.7,
          opacityTo: 0.9,
          stops: [0, 90, 100]
        }
    }
}

$(document).ready(function() {
    function updateAreaChart() {
        $.ajax({
            url: 'model/dashboard/getItemSoldCountperMonth.php',
            method: 'GET',
            success: function(response) {
                try {
                    const jsonResponse = JSON.parse(response);
                    console.log(jsonResponse);
    
                    const itemsSoldData = jsonResponse.perMonthSoldCount.map(item => item.itemsSold);
                    const monthNames = getMonthName(jsonResponse.perMonthSoldCount.map(item => item.month));
    
                    areaChartPurchaseNSales.updateSeries([{name: salesOrdersChartName, data: itemsSoldData}], true);
                    areaChartOptionsPurchaseNSales.xaxis.categories =  monthNames;
    
                } catch (error) {
                    console.log(`Error fetching JSON data: ${error}`);
                }
            }
        });
    }
    
    var areaChartPurchaseNSales = new ApexCharts(
        document.querySelector('#area-chart'),
        areaChartOptionsPurchaseNSales
    );
    updateAreaChart();
    areaChartPurchaseNSales.render();
});