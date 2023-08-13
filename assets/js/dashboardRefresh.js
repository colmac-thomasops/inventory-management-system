function updateItemCount() {
    $.ajax({
        url: 'model/dashboard/getItemType.php',
        method: 'GET',
        dataType: 'text',
        success: function(response) {
            try {
                const jsonResponse = JSON.parse(response);
                if (jsonResponse.success) {
                    $('#itemCountContainer').text(jsonResponse.itemCount);
                } else {
                    console.error('Error fetching JSON data:', jsonResponse.error);
                }
            } catch (error) {
                console.error('Error parsing JSON response:', error);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Error fetching JSON data:', textStatus, errorThrown);
        }
    });
}

function updateActiveVendors() {
    $.ajax({
        url: 'model/dashboard/getActiveVendors.php',
        method: 'GET',
        dataType: 'text',
        success: function(response) {
            try {
                const jsonResponse = JSON.parse(response);
                if (jsonResponse.success) {
                    $('#activeVendorCountContainer').text(jsonResponse.activeVendors);
                } else {
                    console.error('Error fetching JSON data:', jsonResponse.error);
                }
            } catch (error) {
                console.error('Error parsing JSON response:', error);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Error fetching JSON data:', textStatus, errorThrown);
        }
    });
}

function updateItemStockCount() {
    $.ajax({
        url: 'model/dashboard/getItemStockCount.php',
        method: 'GET',
        dataType: 'text',
        success: function(response) {
            try {
                const jsonResponse = JSON.parse(response);
                if (jsonResponse.success) {
                    $('#itemSupplyCountContainer').text(jsonResponse.itemStockCount);
                } else {
                    console.error(`Error fetching JSON data: ${jsonResponse.error}`);
                }
            } catch (error) {
                console.error(`Error parsing JSON response: ${error}`);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Error fetching JSON data:', textStatus, errorThrown);
        }
    })
}

// Call the intial functions for dashboard refresh
updateItemCount();
updateActiveVendors();
updateItemStockCount();

setInterval(() => {
    updateItemCount,
    updateActiveVendors,
    updateItemStockCount
}, 10000);