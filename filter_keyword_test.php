<?php
// Separate file from index.php for testing and experimenting
$input = "fuck";
$is_bad = False;
$file_contents = file_get_contents("blacklist.txt");
$blacklist_array = array(explode('/',$file_contents));
$value = strval($blacklist_array[0][0]);
for ($i=0; $i < count($blacklist_array[0]); $i++){
    if($input == strval($blacklist_array[0][$i])){
        $is_bad = True;
    }
}
if($is_bad){
    print_r("<h4>BLOCKED</h4>");
}else{
    print_r("<h4>ALLOWED</h4>");
}
