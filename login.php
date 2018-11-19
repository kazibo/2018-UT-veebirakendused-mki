<?php

$fb = new Facebook\Facebook([
  'app_id' => '960759930788609',
  'app_secret' => '1c6582355ce248051e4604f27b0f4baa',
  'default_graph_version' => 'v2.2',
  ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('https://example.com/fb-callback.php', $permissions);

echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';

?>