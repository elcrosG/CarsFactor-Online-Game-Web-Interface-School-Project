<?php 
    $connect = new mysqli("localhost", "root", "", "carsfactor");
    $connect->set_charset("utf8");
    if ($connect->connect_error) {
        die("Error: " . $connect->connect_error);
    }
 ?>