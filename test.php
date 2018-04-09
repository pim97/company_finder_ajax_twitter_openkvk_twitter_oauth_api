<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Test</title>
</head>
<body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/reqwest/2.0.5/reqwest.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="./assets/style/style.css">

<div class="container">
  <div class="panel-heading">Bedrijfsinformatie</div>
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
</body>
</html>