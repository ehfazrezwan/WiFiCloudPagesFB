<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <form method="get" action="https://www.accountkit.com/v1.0/basic/dialog/sms_login/" id = "accountKitLogin">
            <input type="hidden" name="app_id" value="123669331588448" id="akAppId"/>
            <input type="hidden" name="redirect" value="" id = "akRedirect"/>
            <input type="hidden" name="state" value="8b1a9953c4611296a827abf8c47804d7" id="state"/>
            <input type="hidden" name="fbAppEventsEnabled" value=true/>
            <input type="hidden" name="country_code" value="+880"/>
            <input type="hidden" name="phone_number" value="" id="akNumber"/>
            <input type="hidden" name="debug" value=true/>
        </form>

    </body>
</html>

<?php
include "func.php";
$func = new Func();

session_start();
if (array_key_exists('ref_url', $_SESSION) && !empty($_SESSION['ref_url'])) {
    if (isset($_POST['gpname']) && !empty($_POST['gpname']) &&
            isset($_POST['emailID']) && !empty($_POST['emailID']) &&
            isset($_POST['gpnumber']) && !empty($_POST['gpnumber'])) {

        $_SESSION['name'] = $_POST['gpname'];
        $_SESSION['email'] = $_POST['emailID'];
        $_SESSION['number'] = $_POST['gpnumber'];

        $key = md5(microtime() . rand());
        $_SESSION['key'] = $key;
        //10 different App ID

        $mappingList = array(
          '182.160.103.106' => '165063240712092',
          '103.4.64.250' => '128105331158005',
          '103.243.81.178' => '128105331158005',
          '182.160.119.18' => '1658774090859368',
          '103.9.115.29' => '1658774090859368',
          '203.202.247.36' => '112006076147220',
          '203.202.245.126' => '473395459693394',
          '182.160.102.118' => '473395459693394',
          '182.160.115.197' => '473395459693394',
          '182.160.101.51' => '1715257285444982',
          '182.160.101.52' => '1715257285444982',
          '182.160.101.50' => '1715257285444982',
          '203.202.245.135' => '144454712809951',
          '144.48.84.250' => '144454712809951',
          '182.160.105.195' => '144454712809951',
          '203.202.247.37' => '1761956603833439',
          '182.160.121.126' => '1942929165962314',
          '103.4.67.212' => '1942929165962314',
          '103.4.67.138' => '111886779520166',
          '182.160.103.118' => '111886779520166',
          '182.160.99.230' => '111886779520166',
          '203.202.243.190' => '1429959413762171',
          '182.160.120.246' => '969689223178660',
          '182.160.113.202' => '1429959413762171',
          '203.202.243.19' => '1429959413762171',
          '182.160.101.194' => '1606943315992135',
          '203.202.254.34' => '1761956603833439',
          '182.160.97.170' => '111886779520166',
          '182.160.122.221' => '111886779520166',
          '182.160.101.26' => '111886779520166',
          '203.202.255.228' => '112006076147220',
          '180.210.175.147' => '128105331158005',
          '180.210.175.138' => '128105331158005',
          '180.210.175.139' => '128105331158005',
          '180.210.175.146' => '1606943315992135',
          '182.160.109.252' => '1606943315992135',
          '182.160.100.18' => '473395459693394',
          '203.202.253.179' => '473395459693394',
          '182.160.121.155' => '1658774090859368',
          '182.160.127.93' => '128105331158005',
          '203.202.247.190' => '128105331158005',
          '202.74.244.242' => '1968643483376422',
          '182.160.121.205' => '1708284252812130',
          '182.160.104.85' => '1708284252812130',
          '182.160.104.86' => '1708284252812130',
          '182.160.109.122' => '1968643483376422',
          '182.160.108.139' => '1968643483376422',
          '182.160.113.202' => '1968643483376422',
          '182.160.102.118' => '1942929165962314',
          '203.202.243.42' => '1942929165962314',
          '182.160.117.60' => '1942929165962314',
          '182.160.120.246' => '1942929165962314',
        );

        $ipAddress = $func->getRealIpAddr();
        // $ipAddress = $func->getRealIpAddr();

        if($ipAddress == '182.160.99.30' || $ipAddress == '203.202.254.35' || $ipAddress == '203.202.254.36' || $ipAddress == '203.202.254.37'){
          $appIdArray = array('120189958644395', '348623772239927', '1911306892526951', '1727518797553217');
          $appId = $appIdArray[rand(0, 3)];
        }else{
          if(isset($mappingList[$ipAddress])){
            $appId = $mappingList[$ipAddress];
          }else{
            $appId = '1021013771374324';
          }
        }

        // echo $appId;
        // $appIdList = array("123669331588448", "144454712809951", "111886779520166", "1942929165962314", "1715257285444982", "128105331158005", "1429959413762171", "473395459693394", "1658774090859368", "801849533323254");

        // $appId = $appIdList[rand(0, 9)];

        $_SESSION['appID'] = $appId;
        ?>
        <script type="text/javascript">
            document.getElementById("akAppId").value = "<?php echo $appId; ?>";
            document.getElementById("akRedirect").value = "<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/AamraCloud/serverManual.php'; ?>";
            document.getElementById("akNumber").value = "<?php echo $_SESSION['number']; ?>";
            document.getElementById("state").value = "<?php echo $_SESSION['key']; ?>";
            document.getElementById('accountKitLogin').submit(); // SUBMIT FORM
        </script>

<?php
    } else {
        header('Location: index.php');
    }
} else {
    die("You Are Not Authorized To Use This Page!!!!!!");
}
?>
