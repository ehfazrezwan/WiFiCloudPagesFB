<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php
if (empty($_SERVER['HTTP_REFERER'])) {
    die("You are not authorized to use this page!");
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
    $parseURL = parse_url($_SERVER["HTTP_REFERER"]);
    $retURL = $parseURL['scheme'] . '://' . $parseURL['host'] . $parseURL['path'] ;
    $redirect = str_replace("login.html", "verify.html", $retURL);
    $_SESSION['ref_url'] = $redirect;
    $_SESSION['mac'] = $_GET['mac'];
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>Aamra WiFi</title>
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet"/>

        <style>
            @media  screen and (max-width: 770px){
                .avatar{
                    margin: 10px auto -10px !important;
                }
            }
        </style>
        <script src="js/jquery-1.4.4.js"></script>
        <script type="text/javascript" src="js/jquery.js"></script>

        <link rel="stylesheet" type="text/css" href="css/style.css"/>
        <link rel="stylesheet" type="text/css" href="css/responsive.css"/>
        <script language="javascript">

            $(document).ready(function () {

                //Change display, if normal email login is
                //selected
               // $("#normalSign").click(function () {
                    $(".connectMethods").css("display", "none");
                    $(".inputBoxInfo").removeAttr('style');
                    $("#userName").focus();
               // });
            });

        </script>
    </head>

    <body>

        <!-- Working Area Starts -->
        <div class="container container-middle">
            <div class="header-logo"><img src="img/top_logo_m.png" alt="We" class="custom-img-responsive hidden-lg hidden-md"/>
                <img src="img/top_logo.png" alt="We" class="custom-img-responsive hidden-xs hidden-sm"/></div>
            <div class="agree-container text-center">
                <div id="firstpage">
                    <div class="m-pad">

                        <div style="color: rgb(255, 234, 0); font-size: 15px">
                            <p id="namemsg"></p>
                            <p id="passwordlengthmsg"></p>
                        </div>

                        <div class="form-box">
                            <div class="inputBoxInfo" style="display: none">
                                <form action="ackitlogin.php" method="post">
                                    <input name="gpname" id="userName" type="text" placeholder="Name" required/>
                                    <input type="email" id="emailID" name="emailID" value="" placeholder="Email ID" required/>
                                    <div class="password">
                                        <input type="tel" pattern="[0-9]{11}" id="phone_number" name="gpnumber" placeholder="Mobile number" required/>
                                        <span class="glyphicon glyphicon-eye-open"></span>
                                    </div>
                                    <div class="col-sm-12 controls">
                                        <button type="submit" onClick="" class="btn btn-success" id = "verifyNum1"> Verify Number </button>
                                        <div><p style="font-size:11px ; margin-top:15px;">By clicking on connect button,
                                                I agree to the
                                                <a href="#" data-toggle="modal" data-target="#myModal" class="terms">Terms of Use </a><br/>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="connectMethods">
                               <!-- <p class="form-text easy">For easy access</p>
                                <a target="_self" class="btn btn-success btn-facebook" id = "FBSign" href="https://www.facebook.com/v2.10/dialog/oauth?client_id=1606943315992135&redirect_uri=http://45.64.135.69/efaz/FBAuth/serverFacebook.php&response_type=code&scope=public_profile,email"><i class="fa fa-facebook"></i> Connect with Facebook </a>
                                <p class="form-text" style="margin-top: 5px;">--------------- OR ---------------</p> -->

                                <a type="button" class="btn btn-warning" id = "normalSign">Sign up with email and mobile number</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="avatar"><a href="#"><a href="#"><img src="img/WE-Ad.gif" /></a>
            </div>

            <div class="footer-logo">
                <p style = "margin-top: 5px">Support: <a href="tel:09666715715">09666715715</a></p>
                <img class="custom-img-responsive hidden-xs hidden-sm" src="img/f-logo.png"/>
                <img class="custom-img-responsive hidden-md hidden-lg" src="img/f-logo_m.png"/>

            </div>
        </div>
        <script type="text/javascript">
            $("#mynumber").keydown(function (e) {
                var oldvalue = $(this).val();
                var field = this;
                setTimeout(function () {
                    if (field.value.indexOf('01') !== 0) {
                        $(field).val(oldvalue);
                    }
                }, 1);
            });
        </script>
        <script type="text/javascript">
        </script>
        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">WiFi – Terms and Conditions</h4>    </div>

                    <div class="modal-body text-ari">


                        This is a Wi-Fi service provided by aamra networks limited. By clicking the connect button on
                        the login page, you agree not to use the service for any activities that are unlawful, immoral
                        or improper. If you do not agree, please do not use the Wi-Fi.<br/><br/>

                        All users are required to log-in individually as an independent user. This service is available
                        only when it is within the range of the Wi-Fi zone.


                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
        <script language="JavaScript">
        </script>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script>
            $(document).ready(function () {

                $("#getpassbtn").click(function () {
                    $("#secondpage").removeAttr('style');
                    $("#firstpage").hide();
                });
            });
        </script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
