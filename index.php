<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Input Filter Tester</title>
    <style>
        .blocked{
            color: red;
        }
        .allowed{
            color: green;
        }
    </style>
</head>
<body>
    <form action="index.php" method="post">
        Enter input: <input type="text" autocomplete="off" name="input">
        <input type="submit" value="Check for Profanity">
    </form>
    <?php
    if(isset($_POST['input'])){
        $input = $_POST['input'];
        $input_array = explode(" ",$input);
        $is_bad = False;
        $file_contents = file_get_contents("blacklist.txt");
        $blacklist_array = explode('/',$file_contents);

        for ($j=0; $j < count($input_array); $j++){
            for ($i=0; $i < count($blacklist_array); $i++){
                if($input_array[$j] == strval($blacklist_array[$i])){
                    $is_bad = True;
                }
            }
        }
        print_r("input is: ". $input . "\n");
        if($is_bad){
            print_r("<h4 class='blocked'>BLOCKED</h4>");
        }else{
            print_r("<h4 class='allowed'>ALLOWED</h4>");
        }
    }
    ?>
</body>
</html>