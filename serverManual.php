<?php

include 'func.php';
session_start();
$key = "";

if (array_key_exists('ref_url', $_SESSION) && !empty($_SESSION['ref_url'])) {
    $key = $_SESSION['key'];
} else {
    header('Location: index.php');
}
$status = $_GET['status'];
$state = $_GET['state'];

if ($status == "PARTIALLY_AUTHENTICATED") {

    if ($key == $state) {

        $ret = postToServer(1);
        if ($ret->success) {
            $mob = $ret->data->mobile;
            $pass = $ret->data->password;
            $redirect = "testing";
            header('Location: ' . $_SESSION['ref_url'] . '?username=' . $mob . '&password=' . $pass . '&ret_url=' . $redirect);
        } else {
            header('Location: ' . $_SESSION['ref_url']);
        }
    } else {
        postToServer(0);
        header('Location: ' . $_SESSION['ref_url']);
    }
} else {
    postToServer(0);
    header('Location: ' . $_SESSION['ref_url']);
    die();
}

function postToServer($verified = 0) {
    $url = 'http://182.160.96.233/aamrawifi/fbverifyapiaamra.php';
    $param = array();
    $func = new Func();
    $param['name'] = $_SESSION['name'];
    $param['email'] = $_SESSION['email'];
    $param['mobile'] = $_SESSION['number'];
    $param['fbid'] = $_SESSION['appID'];
    $param['originflag'] = 0;
    $param['isverified'] = $verified;
    $param['others'] = "";
    $param['ipaddress'] = $func->getRealIpAddr();
    $param['browsername'] = $func->getBrowserName();
    $param['macaddress'] = $_SESSION['mac'];
    $param['token'] = "QNBONNzgoZxnkhlvCPO1rHWTqADpHe9vr6gEJtgM";
    $param['eventType'] = 2;

    return json_decode($func->curlPost($url, $param));
}

?>
