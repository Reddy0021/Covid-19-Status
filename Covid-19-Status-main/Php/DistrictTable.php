<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/jpg" href="./../images/Icon.jpg"/>
    <link rel = "stylesheet" href="./../CSS/DistrictTable.css">
    <link rel = "stylesheet" href = "./../CSS/Home.css">
    <title>District Data</title>
</head>

<body>
    
    <center>
        <!-- <h1>Home Page</h1> -->
        <div class = "navBar">
        <nav>
            <a href = "./Home.php">Home</a>
            <a href = "./WorldData.php">World Data</a>
            <a href = "./IndiaData.php">India Data</a>
            <a href = "./StateData.php">State Data</a>
            <a href = "https://covid-19-symptom-predictor.herokuapp.com/">Symptom Predictor</a>
        </nav>
        </div>
    </center>
    
</body>
</html>

<?php 
    $id = $_GET['Id'];
    $data = file_get_contents("https://api.covid19india.org/state_district_wise.json");
    $getData = json_decode($data,true);
    echo "<table border 1 id = 'myTable'>";
    echo "<tr>
        <th>District Name</th>
        <th>Confirmed Cases</th>
        <th>Active Cases</th>
        <th>Recovered Cases</th>
        <th>No.of Deaths</th>
    </tr>";
    foreach($getData[$id]['districtData'] as $key => $value){
        // echo "$key";
        // echo "<br>";
        echo "<tr>";
        echo "<td>".$key."</td>";
        echo "<td>".$getData[$id]['districtData'][$key]['confirmed'] . "</td>"  ;
        echo "<td>".$getData[$id]['districtData'][$key]['active'] . "</td>"  ;
        echo "<td>".$getData[$id]['districtData'][$key]['recovered'] . "</td>"  ;
        echo "<td>".$getData[$id]['districtData'][$key]['deceased'] . "</td>" ; 
        echo "</tr>";
        
    }

?>
<h1 align = center><?php echo $id;?></h1>

