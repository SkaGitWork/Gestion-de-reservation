<?php
require_once "config.php";


// Get departure stations
function get_departure(){
  $req = mysql_query("select distinct dep from ligne");
  while ($donnes = mysql_fetch_array($req)) {
    $x = $donnes['dep'];
    echo "<option value='$x'>" . $x . "</option>";
  }
}



// If a departure station is set, then get it's value
function get_train(){
  $req = mysql_query("select id from train");
  // Add it to the dropdown list
  while ($donnes = mysql_fetch_array($req)) {
    $x = $donnes['id'];
    echo "<option value='$x'>" . $x . "</option>";
    }
  }
  
  // If a departure station is set, then get it's value
    if (isset($_POST["val"])) {
  
      $val = $_POST['val'];
      $req = mysql_query("select arr from ligne where dep = '$val'");
      // Add it to the dropdown list
      while ($donnes = mysql_fetch_array($req)) {
        $x = $donnes['arr'];
        echo "<option value='$x'>" . $x . "</option>";
      }
    }
  mysql_close();
  
  
  // function all_path()
  // {
// /* ---------------------------------- Test ---------------------------------- */

//   $all_path = [];

//   // Get all path in database
//   $req = mysql_query("select dep, arr from ligne");
//   while ($donnes = mysql_fetch_array($req)){
//     $path = '';
//     $path = $donnes['dep']."-".$donnes['arr'];
//     array_psuh($all_path, $path);
//   }

//   // Intialization    
//   $departure_station = $_POST["val"];
//   $path = "$departure_station";
//   $i = 0;

//   // First call
//   get_all_path($departure_station);
//   // Repeats it's self until all path are gotten
// function get_all_path($var)
// {
//   $req = mysql_query("select arr from ligne where dep = '$var'");

//   if (mysql_num_rows($req) != 0) {
//     while ($donnes = mysql_fetch_array($req)){
      
//     }
//   }else {
//     array_splice($all_path,search($all_path),1);
//   }
  
// }
// }

// function search($array)
// {
// foreach ($array as $value) {
//   if (strpos($a, 'are') !== false) {
//     # code...
//   }
// }
// }
?>



