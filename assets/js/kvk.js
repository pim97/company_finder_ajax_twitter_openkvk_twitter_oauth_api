window.addEventListener("load", init);

function init() {

}

// OpenKvk api key

function openkvk() {
var key = "#apikey";

var name = document.getElementById('pac-input').value;
var get = name.split(",");
var search = get[0];

var openKvk = $.getJSON("https://overheid.io/api/kvk/?query="+search+"*&fields[]=postcode&fields[]=vestigingsnummer&fields[]=actief&fields[]=huisnummer&fields[]=huisnummertoevoeging&fields[]=plaats&fields[]=straat&size=3&ovio-api-key="+key+"") 

    .done(function (data) {
        console.log("success");
        console.log(data);

        var naam = (data._embedded.rechtspersoon[0].handelsnaam);
        var kvkNr = (data._embedded.rechtspersoon[0].dossiernummer);
        var postcode = (data._embedded.rechtspersoon[0].postcode);
        var straat = (data._embedded.rechtspersoon[0].straat);
        var huisNr = (data._embedded.rechtspersoon[0].huisnummer);
        var huisNr2 = (data._embedded.rechtspersoon[0].huisnummertoevoeging);
        var plaats = (data._embedded.rechtspersoon[0].plaats);
        var actief = (data._embedded.rechtspersoon[0].actief);
        var subNr = (data._embedded.rechtspersoon[0].subdossiernummer);
        var vestigingsNr = (data._embedded.rechtspersoon[0].vestigingsnummer);

        //actief bool naar text
        if (actief == 1){
          actief = "Ja"          
        } else {
          actief = "Nee"
        };
            
        $(bedrijfsnaam).empty();
        $(kvknummer).empty();
        $(post).empty();
        $(straatnaam).empty();
        $(huisNummer).empty();
        $(huisNummerToev).empty();
        $(stad).empty();
        $(active).empty();
        $(sub).empty();
        $(vestiging).empty();

        $(bedrijfsnaam).append(naam);
        $(kvknummer).append(kvkNr);
        $(post).append(postcode);
        $(straatnaam).append(straat);
        $(huisNummer).append(huisNr);
        $(huisNummerToev).append(huisNr2);
        $(stad).append(plaats);
        $(active).append(actief);
        $(sub).append(subNr);
        $(vestiging).append(vestigingsNr);
        
        
    }) 
    .fail(function () {
        console.log("error");
    })
    .always(function () {
        console.log("complete");
    });
}