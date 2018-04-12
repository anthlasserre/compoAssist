$('#createCompo').click( function(){

    // Get Team Players Info JSON
    var json = (function () {
        var json = null;
        $.ajax({
            'async': false,
            'global': false,
            'url': './teams/usTyrosse/players/players.json',
            'headers': {
                'Cache-Control': 'no-cache, no-store, must-revalidate', 
                'Pragma': 'no-cache', 
                'Expires': '0'
              },
            'dataType': "json",
            'success': function (data) {
                json = data;
            }
        });
        return json;
      })();

    var numbers = [];
    var game = [];
    var media = [];

    // Get Players User Input
    z=0;
    $('.players').each( function() {
        z++;
        var playerName = $('#'+z).val();

        // Get JSON Info from User Input
        json.fed1.map(function (player) {
            if (player.name == playerName) {
                numbers.push(
                    {
                        "number": z,
                        "name": player.name,
                        "picture": player.picture
                    },
                )
            } else {
              return null
            }
          }); 
    })

    // Get Game Info User Input
    var homeTeamLogo = $('#homeTeamLogo').val();
    var visitTeamLogo = $('#visitTeamLogo').val();
    var gameSponsorsLogo = $('#gameSponsorsLogo').val();
    var division = $('#division').val();
    var date = $('#datetimepicker12').val();
    var location = $('#location').val();

    game.push(
        {
        "homeTeam" : homeTeamLogo,
        "visitTeam" : visitTeamLogo,
        "competition" : division,
        "gameSponsor" : gameSponsorsLogo,
        "date" : date,
        "location" : location
        }
    )

    // Get Media Info User Input
    var background = $('#background').val();
    var website = $('#website').val();

    media.push(
        {
        "background" : background,
        "website" : website,
        }
    )


    // Init Players Compositions + Game Info
    var numbersString = "{ \"numbers\": " + JSON.stringify(numbers) + ",";
    var gameString = "\"game\": " + JSON.stringify(game) + ",";
    var mediaString = "\"media\": " + JSON.stringify(media) + "}";

    var jsonString = numbersString + gameString + mediaString;

    console.log(jsonString);

    // Launch PHP to save the JSON Composition file on Server
    var data = new FormData();
    data.append("data" , jsonString);
    var xhr = (window.XMLHttpRequest) ? new XMLHttpRequest() : new activeXObject("Microsoft.XMLHTTP");
    xhr.open( 'post', 'php/save_composition.php', true );
    xhr.send(data);

})