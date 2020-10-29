<?php
// Separate file from index.php for testing and experimenting

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

if($is_bad){
    print_r("<h4>BLOCKED</h4>");
}else{
    print_r("<h4>ALLOWED</h4>");
}
