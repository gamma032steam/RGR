<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Raffle Group Reports</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="navbar-fixed-top.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html">Raffle Group Reports</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li ><a href="index.html">Home</a></li>
            <li><a href="aboutus.html">About Us</a></li>
            <li><a href="howto.html">How To</a></li>
                        <li><a href="search.php">Search</a></li>
            <li class="active"><a href="report.php">Report (Admin)</a></li>
                                        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Tools <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
                          <li><a href="tool1.html">Vanity to 64ID Converter</a></li>
                               <li><a href="tool2.html">64ID to Profile Name Converter</a></li>
               <li><a href="tool3.html">64ID to Profile Link Converter</a></li>
                  <li><a href="tool4.html">Vanity to Profile Link Converter</a></li>
          </ul>
        </li>
               <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Links <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
                                      <li><a href="new.html">Intro Page</a></li>
            <li><a href="http://steamcommunity.com/groups/rafflegroupreports">Steam Group</a></li>
                                          <li><a href="https://docs.google.com/forms/d/1MJAG4VD47rVf461neLm73D1CqLWPbKOCGn9Oo5xrZLM/viewform">Group Entry Form</a></li>
                          <li class="divider"></li>
            <li><a href="http://steamcommunity.com/groups/TFTRGCommunity">TFTRG Steam Group</a></li>
            <li><a href="http://forums.tftrg.com/">TFTRG Forums</a></li>
            <li class="divider"></li>
            <li><a href="http://steamrep.com/">Steamrep</a></li>
                          <li><a href="http://store.steampowered.com/">Steam</a></li>
                                    <li><a href="http://getbootstrap.com/">Bootstrap</a></li>
          </ul>
        </li>
          </ul>

        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
              <div class="jumbotron">
<?php 
session_start();
define('DB_NAME', 'skaran92_tool');
define('DB_USER', 'skaran92');
define('DB_PASSWORD', 'lolwhat234');
define('DB_HOST', 'localhost');


$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);

if (!$link) {
     die('Could not connect: ' . mysql_error());
     }

     $db_selected = mysql_select_db(DB_NAME, $link);

     if (!$db_selected) {
     die('Can\'t use ' . DB_NAME . ': ' . mysql_error());
     }
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $value11 = test_input($_POST["id64"]);
  $value33 = test_input($_POST["info"]);
  $value44 = test_input($_POST["ev"]);
  $value55 = test_input($_POST["grp"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$value1 = htmlspecialchars($value11, ENT_QUOTES);
$value3 = htmlspecialchars($value33, ENT_QUOTES);
$value4 = htmlspecialchars($value44, ENT_QUOTES);
$value5 = htmlspecialchars($value55, ENT_QUOTES);
echo $value0;
     $value2 = $_SESSION['b64id'];

      $sql = "INSERT INTO Tool (64id, b64id, info, ev, grp) VALUES ('$value1', '$value2', '$value3', '$value4', '$value5')";
     mysql_query($sql);
     mysql_close();
  ?>
<div id="container">
    <h1>Report Submitted</h1>
    <a id="headtext2" href="report.php"><p>Report another user</p></a><br>
<a href="index.html"><p>Return</p></a>
     </div>
   </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
