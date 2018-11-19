function statusChangeCallback(response)
{
	console.log(response);

	if (response.status === 'connected')
	{
		testAPI();
	}
	else
	{
		document.getElementById('status').innerHTML = 'Please log into this app.';
	}
}

function checkLoginState()
{
	FB.getLoginStatus(function(response)
	{
		statusChangeCallback(response);
	});
}

window.fbAsyncInit = function()
{
	FB.init({
		appId      : '960759930788609',
		cookie     : true,
		xfbml      : true,
		version    : 'v2.8'
	});

	FB.getLoginStatus(function(response)
	{
		statusChangeCallback(response);
	});
};

(function(d, s, id)
{
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.1&appId=960759930788609&autoLogAppEvents=1';
	fjs.parentNode.insertBefore(js, fjs);
  
}(document, 'script', 'facebook-jssdk'));

function testAPI()
{
	FB.login(function(response)
{
    if (response.authResponse)
	{
		FB.api('/me', {locale: 'en_US', fields: 'name, email, birthday'},
		function(response)
		{
			var logged = "<?php echo $_SESSION['loggedin']?>";
			
			document.getElementById('status').innerHTML = response.email + "|" + logged + "|" + response.authResponse.userID + "|"; //'Good to see you, ' + response.name + ' | ' + response.email + ' | ';
			console.debug(response);
		});
    }
	/*else
	{
		document.getElementById('status').innerHTML = 'User cancelled login or did not fully authorize.';
    }*/
}, {
    scope: 'email',
    return_scopes: true
});
	/*FB.api('/me', function(response)
	{
		document.getElementById('status').innerHTML = 'Thanks for logging in, ' + response.name + ' | ' + response.email;
	});*/
}