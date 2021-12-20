<?php

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db_name = "perikanannusantara";

    try {    
        //koneksi
        $db = new PDO("mysql:host=$host;dbname=$db_name", $user, $pass);

    } catch(PDOException $e) {
        //show error
        die("Koneksi Gagal: " . $e->getMessage());

    }

?>