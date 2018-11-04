<!DOCTYPE html>
<html>
<head>
<title>Facebook Login JavaScript Example</title>
<meta charset="UTF-8">
</head>
<body>
<div id="fb-root"></div>

<!--
<div class="fb-login-button" data-max-rows="1" data-size="large" data-button-type="continue_with" data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="false"></div>
-->
<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
</fb:login-button>


<div id="status">
</div>
<script src="js/fb.js"></script>
</body>
</html>