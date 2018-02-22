<?php

  $code = $_GET['code'];

  $appID = "1606943315992135";
  // Page to redirect to
  $redirect = "http://45.64.135.69/efaz/FBAuth/serverFacebook.php";
  $secret = "5b9873a926e9d2d1faa1d994a65a645d";
  // Set GET parameters for access token exchange
  $exchangeUrlParams = "client_id={$appID}&redirect_uri={$redirect}&client_secret={$secret}&code={$code}";

  //Store access token from graph API
  $returnData = doCurl("https://graph.facebook.com/v2.10/oauth/access_token?".$exchangeUrlParams);

  $parsedData = json_decode($returnData);
  $accessToken = $parsedData->access_token;

  //Go back to login page with access token as GET parameter
  // header('Location: http://192.168.0.100/WEHotspot/login.html?accessToken='.$accessToken);
  $urlParts = parse_url($_SERVER['HTTP_REFERER']);
  $ret_url = $urlParts["scheme"] . '://' . $urlParts["host"] . $urlParts["path"] . '?accessToken=' . $accessToken;
  header('Location: '.$ret_url);

  die();

  //Function to get JSON response from url
  function doCurl($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
  }


 ?>
