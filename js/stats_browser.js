function getVisitors(timestamp)
{
    var queryString = {'timestamp' : timestamp};

    $.ajax(
        {
            type: 'GET',
            url: 'https://nelichan.tk/php/visitors.php',
            data: queryString,
            success: function(data){
                var obj = jQuery.parseJSON(data);
                $('#visitors').html(obj.count);
                getVisitors(obj.timestamp);
            }
        }
    );
}

function getOpsys(timestamp)
{
    var queryString = {'timestamp' : timestamp};

    $.ajax(
        {
            type: 'GET',
            url: 'https://nelichan.tk/php/topOS.php',
            data: queryString,
            success: function(data){
                var obj = jQuery.parseJSON(data);
                $('#OS').html(obj.system);
                getOpsys(obj.timestamp);
            }
        }
    );
}

function getBrowser(timestamp)
{
    var queryString = {'timestamp' : timestamp};

    $.ajax(
        {
            type: 'GET',
            url: 'https://nelichan.tk/php/topBrowser.php',
            data: queryString,
            success: function(data){
                var obj = jQuery.parseJSON(data);
                $('#browser').html(obj.browser);
                getBrowser(obj.timestamp);
            }
        }
    );
}

function getCountry(timestamp)
{
    var queryString = {'timestamp' : timestamp};

    $.ajax(
        {
            type: 'GET',
            url: 'https://nelichan.tk/php/topCountry.php',
            data: queryString,
            success: function(data){
                var obj = jQuery.parseJSON(data);
                $('#country').html(obj.country);
                getCountry(obj.timestamp);
            }
        }
    );
}

// initialize jQuery
$(function() {
    getVisitors();
	getOpsys();
	getCountry();
	getBrowser();
});