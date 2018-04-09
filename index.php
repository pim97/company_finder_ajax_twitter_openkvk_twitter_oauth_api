<?php
$company = "";
?> 

<!DOCTYPE html>
<html>
  <head>
    <title>Company finder</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Twitter API Fetcher" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/reqwest/2.0.5/reqwest.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.rawgit.com/stevenmonson/googleReviews/6e8f0d79/google-places.js"></script>
    
    <link rel="stylesheet" href="https://cdn.rawgit.com/stevenmonson/googleReviews/master/google-places.css">

    <link rel="stylesheet" type="text/css" href="./assets/style/style.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,400i,700,700i|Montserrat:200,200i,300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	
  </head>
  <body>

  <section class="cover-1 text-center">
			<nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
				<div class="container">
					<a class="navbar-brand" href="#"><i class="fa fa-briefcase" aria-hidden="true"></i> COMPANY FINDER</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

				</div>
			</nav>
			<div class="cover-container pb-5">
				<div class="cover-inner container">
					<h1 style="text-shadow: 2px 2px 4px #000000;" class="jumbotron-heading">Are you <em>searching</em> for a business that <strong>fits your needs?</strong></h1>
					<p class="lead">A collection of multiple API's will give you loads of information to see if the company meets your needs.</p>
					
                    <form action="#" method="POST">

                    <input name="company_name" style="text-align:center;" id="pac-input" class="controls" type="text" 
                        placeholder="Search your company here" onclick="ClearFields()"/>
                    
                    <div id="infowindow-content">
                    <span id="place-name"  class="title"></span><br>
                    Place ID <span id="place-id"></span><br>
                    <span id="place-address"></span>
                    </div>

                    </form>

                        <form action="./index.php" method="GET">
                        <p>
                            <input type="submit" name="submitbutton" href="#" value="Click to refresh page to try again" class="btn btn-primary btn-lg mb-2 mr-2 ml-2">
                        </p>
                    </form>
				</div>
			</div>
		</section>
        <section class="cover-5 text-left">
		
			<div class="cover-container">
				<div class="cover-inner container">
                    <div class="row justify-center">
                        <div class="container">
                            <h1 class='jumbotron-heading'>Just looking for some information?</h1>
                                <table class="table">
                                <tr>
                                    <td><div class="box" ><p>Bedrijfsnaam:</p></div></td>
                                    <td><div class="box" id="bedrijfsnaam"></div></td>
                                </tr>
                                <tr>
                                    <td><div class="box" ><p>KvK-nummer:</p></div></td>
                                    <td><div class="box" id="kvknummer"></div></td>
                                </tr>
                                <tr>
                                    <td><div class="box" ><p>Postcode:</p></div></td>
                                    <td><div class="box" id="post"></div></td>
                                </tr>
                                <tr>
                                    <td><div class="box" ><p>Straat:</p></div></td>
                                    <td><div class="box" id="straatnaam"></div></td>
                                </tr>
                                <tr>
                                    <td><div class="box" ><p>Huisnummer:</p></div></td>
                                    <td><div class="box" id="huisNummer"></div></td>
                                </tr>
                                <tr>
                                    <td><div class="box" ><p>Huisnummertoevoeging:</p></div></td>
                                    <td><div class="box" id="huisNummerToev"></div></td>
                                </tr>
                                <tr>
                                    <td><div class="box" ><p>Plaats:</p></div></td>
                                    <td><div class="box" id="stad"></div></td>
                                </tr>
                                <tr>
                                    <td><div class="box" ><p>Actief:</p></div></td>
                                    <td><div class="box" id="active"></div></td>
                                </tr>
                                <tr>
                                    <td><div class="box" ><p>Subdossiernummer:</p></div></td>
                                    <td><div class="box" id="sub"></div></td>
                                </tr>
                                <tr>
                                    <td><div class="box" ><p>Vestigingsnummer:</p></div></td>
                                    <td><div class="box" id="vestiging"></div></td> 
                                </tr>
                                </table>
                            </div>
                        </div>
                            <script src="./assets/js/kvk.js"></script>
                    </div>
			</div>
		</section>

        <section class="cover-2 text-left">
		
			<div class="cover-container">
				<div class="cover-inner container">
						<div class="row justify-center">
							<div class="v">

								<h1 class="jumbotron-heading">Maybe information on social media will change your mind?</h1>

								<p class="lead">Social media says alot about a company, if they respond to user very quickly, they might be a very well structured organisation.</p>
								
						</div>

                        <div id="twitter_msg">
                            <?php

                            if (isset($msg)) {
                                echo $msg;
                            }

                            ?>
                        </div>
					</div>
				</div>
			</div>
		</section>

        <section class="cover-5 text-center">
			
			<div class="cover-container pb-5 ">
				<div class="cover-inner container" id="tweets">

                    <?php

                    use Abraham\TwitterOAuth\TwitterOAuth;

                    function reload() {
                        //Json in bestand
                        $file = './assets/json/twitter.json';
                        file_put_contents($file, "");

                        require("./autoload.php"); 

                        define('CONSUMER_KEY', 'ub86mUG9JW1EMvtV7e035P8Fm');
                        define('CONSUMER_SECRET', 'zbCqodguS7rrJl5kH6pdK8tD0mI9YShJh5NI8TbnE0MzFRptus');
                        define('ACCESS_TOKEN', '110994034-0rV3t8FJrL1Vze7Lcr3mHoOFS3Zay0jbvq0U1pID');
                        define('ACCESS_TOKEN_SECRET', 'CIux5QJlOSAtg36y5SuK9W8lqEgWgJ0MLjT3BrcB6dEbI');

                        function search(array $query)
                        {
                        $toa = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);
                        return $toa->get('search/tweets', $query);
                        }

                        $query = [
                        "q" => isset($_COOKIE['ppkcookie']) ? $_COOKIE['ppkcookie'] : "null", // search words on Russian language
                        "lang" => "nl"
                        ];

                        ?>


                        <?php
                        $current = "";
                        $results = search($query);
                        
                        $current = json_encode($results, JSON_UNESCAPED_SLASHES);
                        file_put_contents($file, $current);
                    }
                    ?>
				</div>
			</div>
		</section>


        

</form>


<script type="text/javascript">

    function loadkeys () {
    
    var z = document.getElementById("pac-input").value;
    var x = document.getElementById("twitter_msg");

    var name = z.split(",");
    var company_name = name[0];

    createCookie('ppkcookie',company_name,1);

    <?php   
        reload();
    ?>

    x.innerHTML = "<a class='twitter-timeline' data-width='450' data-height='550' data-theme='dark' data-link-color='#9266CC' href='https://twitter.com/"+company_name+"'>A twitter list</a>"; 

    var newScript = document.createElement("script");
    newScript.setAttribute('src','//platform.twitter.com/widgets.js');
    var inlineScript = document.createTextNode("alert('Hello World!');");
    newScript.appendChild(inlineScript); 
    document.body.appendChild(newScript);

    var jqxhr = $.getJSON( "./assets/json/twitter.json", function() {
        format: "jsonp"
        
    })
        .done(function(data) {

        var x = document.getElementById("tweets");
        x.innerHTML = "<h3>Tweets by: "+company_name+"</h3><table class='table table-inverse' style='border: 1px solid black;'>";

        console.log(data);
        for (var i = 0; i < data.statuses.length; i++) {
            x.innerHTML += "<br/><tr> <u>Gebruiker schrijft: "+data.statuses[i].user.name+"</u></tr> <br/> <td>" + data.statuses[i].text+"</td><br/>"
        }

        x.innterHTML += "</table>";

        })
        .fail(function(data) {
        })
        .always(function() {
        });
    }
</script>
      

    <div id="map"></div>
    <div id="infowindow-content">
      <span id="place-name"  class="title"></span><br>
      Place ID <span id="place-id"></span><br>
      <span id="place-address"></span>
    </div>

<div id="google-reviews"></div>

<script src="./assets/js/main.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDWR_MeYJj-XX4ghTJ_kBSAq0Dxd0HXpDc&libraries=places&callback=initMap">async defer</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/reqwest/2.0.5/reqwest.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   
<script src="https://cdn.rawgit.com/stevenmonson/googleReviews/6e8f0d79/google-places.js"></script>
    
<link rel="stylesheet" href="https://cdn.rawgit.com/stevenmonson/googleReviews/master/google-places.css">
</body>
</html>
