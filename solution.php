<?php

$testData = [3,2,10.00,20.00,4,15.00,15.01,3.00,3.01,3,5.00,9.00,4.00,2,2,8.00,6.00,2,9.20,6.75,0];

//initialize variables
$trips = [];
$tripsHash = [];
$charges = 0;
$total = 0;

//display results formatted
function displayNum($num){
  $rounded = round($num,2);
  if ($rounded>0){
    return  "$".$rounded;
  } else {
    return "($".($rounded * -1).")";
  }
}

//find starting and ending index of each trip and store at $trips array
foreach ($testData as $key => $value ){
  if ( gettype($testData[$key]) == "integer" && isset($testData[$key+1]) && gettype($testData[$key+1]) == "integer" ){
    if ($key!= 0){array_push($trips,$key-1);}
    array_push($trips,$key);
  }
}

$last = sizeof($testData)-2;
array_push( $trips, $last);

//go through each trip, get total charges for each member and insert to tripHash associative array
foreach($trips as $key=>$val){

  if($key%2 != 0){ continue; }
  $trip=[];
  for( $i=$val+1; $i<=$trips[$key+1]; $i++){

    if(gettype($testData[$i])=="integer"){
      for($n=1; $n<=$testData[$i] ;$n++){$charges += $testData[$i+$n];}
      array_push($trip,$charges);
      $charges = 0;
    }

  }
  $tripsHash[]=$trip;
}

//display results
foreach($tripsHash as $trip){
  foreach($trip as $participant){ $total += $participant; }
  $equalShare = $total/ sizeof($trip);
  foreach($trip as $participant){ echo displayNum($equalShare - $participant)."\n"; }
  $total = 0;
}


?>
