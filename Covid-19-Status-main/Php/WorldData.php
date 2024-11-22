<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/jpg" href="./../images/Icon.jpg"/>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel = "stylesheet" href = "./../CSS/worldData.css">
    <link rel = "stylesheet" href = "./../CSS/Home.css">
    <link rel = "stylesheet" href = "./../CSS/Search.css">
    <title>World Data</title>
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
    <h1 style = 'color:red' align = center>Country wise Corona virus Status </h1>
    <!-- <input type = 'text' id='myInput' onkeyup='myFunction()' placeholder = 'Enter country  to search' style = 'margin-left: 35%'> -->
    <center>
    <div class="search-box">
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
    set_time_limit(10);
    echo "<br>";
    // echo "<input type = 'text' id='myInput' onkeyup='myFunction()' placeholder = 'Enter country to search' style = 'margin-left: 35%'>";
    echo "<br>";
    echo "<br>";
    echo "<br>";

    echo "<table border = 1 id='myTable'>";
        echo "<tr>
            <th> Last Updated Date & Time</th>
            <th>Country </th>
            <th>New Confirmed Cases</th>
            <th>Total Confirmed cases</th>
            <th>Active Cases</th>
            <th>New Recovered cases</th>
            <th>Total Recovered </th>
            <th>New Deaths </th>
            <th>Total Deaths </th>
            <th>Country Code </th>
        </tr>";
        $data = file_get_contents('https://api.covid19api.com/summary'); // World
        $getData= json_decode($data, true);
        $length = count($getData['Countries']);
        $i=1;
        while($i < $length){
            $active = abs($getData['Countries'][$i]['TotalConfirmed'] - $getData['Countries'][$i]['TotalRecovered'] - $getData['Countries'][$i]['TotalDeaths']);
            echo "<tr>";
            echo "<td>".$getData['Countries'][$i]['Date']."</td>";
            echo "<td>".$getData['Countries'][$i]['Country'] ."</td>";
            echo "<td>".$getData['Countries'][$i]['NewConfirmed'] . "</td>";
            echo "<td>".$getData['Countries'][$i]['TotalConfirmed'] . "</td>";
            echo "<td>".$active. "</td>";
            echo "<td>".$getData['Countries'][$i]['NewRecovered'] ."</td>";
            echo "<td>".$getData['Countries'][$i]['TotalRecovered'] ."</td>";
            echo "<td>".$getData['Countries'][$i]['NewDeaths'] . "</td>"; 
            echo "<td>".$getData['Countries'][$i]['TotalDeaths'] . "</td>"; 
            echo "<td>".$getData['Countries'][$i]['CountryCode'] . "</td>"; 
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
   