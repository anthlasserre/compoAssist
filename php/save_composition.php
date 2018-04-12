<?php
if(!empty($_POST['data'])){
    $data = $_POST['data'];
    $fname = mktime() . ".json";//generates random name
    
    $file = fopen("./teams/usTyrosse/compositions/" .$fname, 'w');//creates new file
    fwrite($file, $data);
    fclose($file);
}
?>