<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Game Composition</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.0.0/journal/bootstrap.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/index.css">
    <script
        src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
    <script src="http://html2canvas.hertzen.com/dist/html2canvas.js"></script>
    <script src="./js/main.js"></script>
        
</head>
<body>

<?php
$dir = "./teams/usTyrosse/compositions/";
   $result = array(); 

   $cdir = scandir($dir); 
   foreach ($cdir as $key => $value) 
   { 
      if (!in_array($value,array(".",".."))) 
      { 
         if (is_dir($dir . DIRECTORY_SEPARATOR . $value)) 
         { 
            $result[$value] = dirToArray($dir . DIRECTORY_SEPARATOR . $value); 
         } 
         else 
         { 
            $result[] = $value; 
         } 
      }
   }
   ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">ASSISTANT COMPOSITION</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./create.html">Create</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

<h1>Dernières compositions</h1>

<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">Compétition</th>
            <th scope="col">HomeTeam</th>
            <th scope="col">VisitTeam</th>
            <th scope="col">Date</th>
        </tr>
    </thead>
    <tbody data-link="row" class="rowlink">
        
<?php
    
    $nbFiles=count($result);
    $i=0;

    while ($i < $nbFiles)
    {
        $file = explode("_", $result[$i]);
        $fileName = substr($result[$i],0,-5);
        // print $fileName;
        $homeTeam = $file[0];
        $visitTeam = $file[1];
        $date = $file[2];
        $competition = substr($file[3], 0,-5);

        // Reformat
        $date = substr($date,0,2)."/".substr($date,2,-2)."/".substr($date,4);
        if($competition == "Fed1")
        {
            $competition = "Fédérale1";
        }
        ?>

        <tr class="table-active clickable-row" data-href=<?php print "./composition.html?file=".$fileName ?>>
            <th scope="row"><?php print $competition ?></th>
            <td><?php print $homeTeam ?></td>
            <td><?php print $visitTeam ?></td>
            <td><?php print $date ?></td>
        </tr>

        <?php
        $i++;
    }
?> 

    </tbody>
</table>

<script>
    jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.open(
            $(this).data("href"),
            '_blank'
        );
    });
});
</script>
</body>
</html>