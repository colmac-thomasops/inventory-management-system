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
                    console.error('Error fetching item count:', jsonResponse.error);
                }
            } catch (error) {
                console.error('Error parsing JSON response:', error);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Error fetching item count:', textStatus, errorThrown);
        }
    });
}

updateItemCount();

setInterval(updateItemCount, 10000) // 10000 milliseconds = 10 seconds