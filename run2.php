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
                        <li class="active"><a href="search.php">Search</a></li>
            <li><a href="report.php">Report (Admin)</a></li>
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

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
              <a href="search.php"><p>Return</p></a>
<?php

define('DB_NAME', 'whatsup4_tool');
define('DB_USER', 'whatsup4');
define('DB_PASSWORD', 'Hero1992');
define('DB_HOST', 'localhost');

$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);

if (!$link) {
     die('Could not connect: ' . mysql_error());
     }

     $db_selected = mysql_select_db(DB_NAME, $link);

     if (!$db_selected) {
     die('Can\'t use ' . DB_NAME . ': ' . mysql_error());
     }


       
if ($_SERVER["REQUEST_METHOD"] == "GET") {
  $value1 = test_input($_GET["id64"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}



require("include.php");

//Steam Name
echo "<p>";
echo getname($value1);
echo "</p>";

//DP
$profile = getimgurl($value1);
echo "<img src=$profile alt='profilepic' id='profilepic'><br>";

$floatright = "floatright";
echo "<div id=$floatright>";

//Steam Profile Link
echo "<p>The Steam profile link is <a href=http://steamcommunity.com/profiles/$value1>http://steamcommunity.com/profiles/$value1</a></p><br>"; 

//Steamrep Link and Rep
echo "<p>SteamRep notes: <a href=http://steamrep.com/profiles/$value1>";
echo GetRep($value1);
echo "</a></p><br>";

//Online Status
echo "<p>Steam status:";
echo stateMessage("$value1");
echo "</p><br>";

echo "</div>";

echo "<p>Reports</p>";
//set up the database connection

    $conn = new PDO('mysql:host=localhost;dbname=whatsup4_tool', 'whatsup4', 'Hero1992');

//get the value for the HTML input field named "login_username" given to us by POST.

    $username = $value1;

//prepare a mySql query.  Doing it this way prevents injection attacks.
$query1 = $conn->prepare("SELECT * FROM Tool WHERE 64id = :username");
//bind the username variable to the username slot in the prepared query
$query1->bindParam(':username', $username, PDO::PARAM_STR);
//execute the query
$query1->execute();
//echo back the number of rows returned by the query, AKA the number of users with that username.  obviously, if I've written my authentication properly, there should only be one ;)
$reports = $query1->rowCount();

if($reports <= 0){
Print "<p>There are no reports on this user.</p>";
} elseif($reports = 1) {
Print "<p>There is ".$reports." report on this user.</p>";
} else {
Print "<p>There are ".$reports." reports on this user.</p>";
}


 $data = mysql_query("SELECT * FROM Tool WHERE 64id='$value1'") 
 or die(mysql_error()); 
 Print "<table border cellpadding=3>"; 
 while($info = mysql_fetch_array( $data ))
 {
 Print "<p><b>Report by <a href=http://steamcommunity.com/profiles/".$info['b64id'] ." > " .$info['b64id'] ."</a></b><br>"; 
 Print "<b>Infringement: </b> ".$info['info']. "<br>"; 
 Print "<b>Evidence: </b>".$info['ev'] . " <br>"; 
 Print "<b>Reporter: </b>".$info['b64id'] . " <br>"; 
 Print "<b>Time: </b> ".$info['time'] . " <br>"; 
 Print "<b>Group: </b> ".$info['grp'] . " <br>"; 
 }   

      mysql_close();
?>

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