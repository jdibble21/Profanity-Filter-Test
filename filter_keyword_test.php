<?php
// Separate file from index.php for testing and experimenting

// When running just this file, change $input to test custom input
$input = "jake is a nice shit";
$input_array = explode(" ",$input);

$is_bad = False;
$file_contents = file_get_contents("blacklist.txt");
$blacklist_array = array(explode('/',$file_contents));
for ($j=0; $j < count($input_array); $j++){
    for ($i=0; $i < count($blacklist_array[0]); $i++){
        if($input_array[$j] == strval($blacklist_array[0][$i])){
            $is_bad = True;
        }
    }
}
// When we integrate with the Betterflye system, this will come up as an BLOCKED/ALLOWED
// admin message and pop up message for the user, not just a print statement
if($is_bad){
    print_r("BLOCKED");
}else{
    print_r("ALLOWED");
}
