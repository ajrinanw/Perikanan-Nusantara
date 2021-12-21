<?php

    include_once("koneksi.php");
    $id_jurnal = $_GET['id'];
    $date = mysqli_query($koneksi, "SELECT * FROM jurnal WHERE id_jurnal=$id_jurnal");

    if(mysqli_num_rows($date) != 0) {
        $result = mysqli_query($koneksi, "DELETE FROM jurnal WHERE id_jurnal=$id_jurnal");
        if($result) {
            header("Location: jurnal.php");
        }
    } else {
        echo "<a href='jurnal.php'>Kembali</a>";
    }
    

?>