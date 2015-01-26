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

require 'steamauth/steamauth.php';
$userPermitted = array(
    
                       //GMF
                       76561198067637553, // Iceyplox
                       76561198096021772, // Mage Potioneer
                       76561198030422731, // A spiderman
                       
                       //RH
                       76561198009962218, // Smokethebear
                       76561198061674833, // Shackswatch
                       76561198049799151, // CheesySpecs2705
                       76561198054420235, // Theboss243
                       76561198078598002, // Chicken Hunter
                       76561198104851641, // Kemal
                      
                       //KGBdan
                       76561198057653416, // KGBdan
                       76561198135943552, // Echofoxx
                       76561198105099638, // SKREWEY
                       76561198105099638, // Jake
    
                       //TTRG
                       76561198097320230, // Lavashark
                       76561198072123345, // sonicgamerboy
                       76561198064828291, // Dominates a slut
                       76561198045801695, // Bubbleman427
                       76561198051083994, // Awesomeone
                       76561198119300626, // Jlcraftable
                       76561198080887866, // Sheba

                       //D2TRG
                       76561198058365176, // Del
                       76561198101131315, // Milton
    
                       //TFTRG
                       76561198086832121, // SirSpark
                       76561198097422673, // DarkFyre
                       76561198073618970, // Woofles
                       76561198059903283, // Pigles
                       76561198073313522, // Fae
                       76561198019973842, // Frost
                       76561198044873576, // Gamma
                       76561198061239658, // Walker
                       76561198037237481, // Tyrone
                       76561198059430645, // Poopa
                       76561198071750788, // Love
                       76561198053519412, // Artful
                       76561198046958131, // Yunz
                       76561198059682839, // Lulu
                       76561198050610274, // Knitro
                       76561198059179348, // Kelvin
                       76561198059420483); // Dee_Jay                    
 if(!isset($_SESSION['steamid'])) {
    steamlogin(); //login button
} else {
     $variable = $_SESSION['steamid'];
    $_SESSION['b64id'] = $variable;
    $html = '
    <div id="container">
            <h1>Report a User</h1>
                <p id="headtext">Report users that have broken the rules by completing the form below.</p>
            <form action="run.php" method="post" id="form"/>
            <p>User&#039;s 64 ID: <input type="text" name="id64" required></br>
            <p>Group:</p><select name="grp">
  <option value="TFTRG">TFTRG</option>
  <option value="TTRG">TTRG</option>
  <option value="DTRG">DTRG</option>
  <option value="KGBDAN">KGBdan</option>
  <option value="RH">RH</option>
    <option value="GMF">GMF</option>
 </select>
            <p id="headtext">Infringement:</p><br><textarea cols="40" rows="8" name="info" required></textarea></br>
            <p>Evidence:</p><br> <textarea cols="40" rows="8" name="ev"></textarea></br>
               <input class="btn-lg btn-danger" id="submit" type="submit" value="Submit"/><br>
                </form>
                
        
';

   if (in_array($_SESSION['steamid'], $userPermitted)){
        include ('steamauth/userInfo.php'); //To access the $steamprofile array
        echo $html;
 require("include.php");

//Steam Name
$headtext = "headtext";
echo "<p id=$headtext>You are currently logged in as: ";
echo getname($variable);
echo "</p><br>";
        logoutbutton(); //Logout Button
          }
    else{
        echo 'You must be a registered admin of a contributing group in order to use this tool.';
    }
}
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
