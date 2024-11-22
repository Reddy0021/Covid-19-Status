<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/jpg" href="./../images/Icon.jpg"/>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel = "stylesheet" href = "./../CSS/Search.css">
    <link rel="stylesheet" href = "./../CSS/IndiaData.css">
    <link rel="stylesheet" href = "./../CSS/Home.css">
    <title>India Data</title>
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
    <br>
    <h1 style = 'color:red' align = center>State wise Corona virus Status </h1>
    <br>
        <center>
        <div class="search-box" >
        <button class="btn-search">
            <i class="fas fa-search">
            </i>
        </button>
        <input type="text" class="input-search" id='myInput' onkeyup=myFunction() placeholder="Enter country name...">    
        </div>
        </center>

    
</body>
</html>


<?php
    // set_time_limit(6000000000);
    // echo "<h1 style = 'color:red' align = center>State wise Corona virus Status </h1>";
    // echo "<input type = 'text' id='myInput' onkeyup='myFunction()' placeholder = 'Enter State to search' style = 'margin-left: 45%'>";
    echo "<br>";
    echo "<br>";
    echo "<table border 1 id = 'myTable'>";
    echo "<tr>
        <th>Last Updated Date & Time</th>
        <th>State</th>
        <th>Confirmed Cases</th>
        <th>Active Cases</th>
        <th>Recovered Cases</th>
        <th>No.of Deaths</th>
    </tr>";
    $data = file_get_contents('https://api.covid19india.org/data.json');// INDIA
    // print_r($data);
    $getResult= json_decode($data, true);
    $length = count($getResult['statewise']);
    // echo $length;
    $i=1;
    while($i < $length){
      echo "<tr>";
      echo "<td>".$getResult['statewise'][$i]['lastupdatedtime'] . "</td>"  ;
      echo "<td>".$getResult['statewise'][$i]['state'] . "</td>"  ;
      echo "<td>".$getResult['statewise'][$i]['confirmed'] . "</td>"  ;
      echo "<td>".$getResult['statewise'][$i]['active'] . "</td>"  ;
      echo "<td>".$getResult['statewise'][$i]['recovered'] . "</td>"  ;
      echo "<td>".$getResult['statewise'][$i]['deaths'] . "</td>" ; 
      echo "</tr>";
      $i++;
    }
    echo "</table>";
?>

<script>
    function myFunction() {

        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
            }
        }
    }
</script>
