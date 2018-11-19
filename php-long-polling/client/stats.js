function getContent(timestamp)
{
    var queryString = {'timestamp' : timestamp};

    $.ajax(
        {
            type: 'GET',
            url: 'https://nelichan.tk/php/visitors.php',
            data: queryString,
            success: function(data){
                var obj = jQuery.parseJSON(data);
				//alert("HEY");
                $('#response').html(obj.count);
                getContent(obj.timestamp);
            }
        }
    );
}

// initialize jQuery
$(function() {
    getContent();
});