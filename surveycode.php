<?php
    error_reporting(1);
    include("conn.php");
    $sabr = 0;
    $sqlv2 = "SELECT * FROM survey_name ORDER BY idS ";
    $result2 = mysqli_query($connect, $sqlv2);
    $diziv2 = array();
    while ($row2 = mysqli_fetch_assoc($result2)) {
        $diziv2[] = $row2; //anabaşlık
    }
    $idv1 = $diziv2[$sabr]["idS"];
    $sql = "SELECT * FROM survey_questions WHERE idS =" . $idv1;
    $result = mysqli_query($connect, $sql);
    $dizi = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $dizi[] = $row; //cevaplar
    }
    ?>  
