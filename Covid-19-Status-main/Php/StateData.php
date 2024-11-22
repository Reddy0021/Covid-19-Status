<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/jpg" href="./../images/Icon.jpg"/>
    <link rel = "stylesheet" href = "./../CSS/stateData.css">
    <title>State Data</title>
</head>
<body>
    
</body>
</html>

<?php 
    set_time_limit(600);

    echo '<body style="background-color:black">';

    echo "<marquee style ='color:red; display:block;background-color:yellow;height:30px'>Press on the particular state to know their corresponding district numbers</marquee>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    $data = file_get_contents("https://api.covid19india.org/state_district_wise.json");
    $getData = json_decode($data,true);
    $length = count($getData);
    $i=1;
    // print_r($getData);
    foreach($getData as $key =>$value){
        if($key != "State Unassigned"){
    ?>
    <center>
        <a href = "./DistrictTable.php?Id=<?php echo $key;?>"><?php echo $key?></a>
    </center>
    <?php
        echo "<br>";
        $i +=1;
        }
    }
    echo "</body>";
    // echo $i;
    // print_r($getData);
?>
