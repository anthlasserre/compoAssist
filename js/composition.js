var url = window.location.search.substring(1);
var jsonFile = url.substring(5) + ".json";
var jsonFilePath = "./teams/usTyrosse/compositions/"+jsonFile;

console.log(url);
console.log(jsonFile);
console.log(jsonFilePath);

var json = (function () {
  var json = null;
  $.ajax({
      'async': false,
      'global': false,
      'url': jsonFilePath,
      'dataType': "json",
      'success': function (data) {
          json = data;
      }
  });
  return json;
})(); 

// Game
var homeTeam = json.game[0].homeTeam;
var visitTeam = json.game[0].visitTeam;
var competition = json.game[0].competition;
var gameSponsor = json.game[0].gameSponsor;
var date = json.game[0].date;
var gameLocation = json.game[0].location;

// Media
var background = json.media[0].background;
var website = json.media[0].website;

// Init
$('#background').css('backgroundImage','url('+background+')');
$('#homeTeam').attr('src',homeTeam);
$('#visitTeam').attr('src',visitTeam);
$('#sponsor').attr('src',gameSponsor);
$.each( json.numbers, function( key ) {
  var number = json.numbers[key].number;
  var name = json.numbers[key].name;
  var picture = json.numbers[key].picture;
  
  console.log(number + " | " + name);
  $('#'+number).attr('src',picture);
});
$('#date').text(date);
$('#location').text(gameLocation);
$('#website').text(website);
$('#24').text("24 | "+ json.numbers[23].name);
$('#25').text("25 | "+ json.numbers[24].name);