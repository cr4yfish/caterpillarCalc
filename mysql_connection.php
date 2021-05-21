<?php 
    
    $servername = "rdbms.strato.de";
    $user = "dbu596396";
    $pw = "FpDAtg7neWIL9E";
    $dbname = "dbs2000829";
    
    $con = mysqli_connect($servername, $user, $pw, $dbname);

    if($con->connect_error) {
        die("SQL Connection failed!");
    }

    $result = mysqli_query($con, "SELECT * FROM moneten");

    ?>