<?php 
include("connect.php");
$sorgu = $connect->query("SELECT * FROM survey_user_answer "); 
//id değeri ile düzenlenecek verileri veritabanından alacak sorgu
$sonuc = $sorgu->fetch_assoc(); //sorgu çalıştırılıp veriler alınıyor
$sql = "SELECT * FROM survey_user_answer ORDER BY id ";
$result = mysqli_query($connect, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $dizi[] = $row; //cevaplar
}
//echo $sonuc["user_answer"];
$trend = $connect->query("SELECT user_answer,COUNT(*) as sayac FROM `oylar` GROUP BY user_answer ORDER BY id DESC");
foreach ($sonuc as $key => $lock) {
   // echo $lock ; echo "<pre>"; 
}
/*$sorgu = $baglan->prepare("SELECT COUNT(*) FROM survey_user_answer");
$sorgu->execute();
$say = $sorgu->fetchColumn();
$query = mysql_query("SELECT * FROM `users`");
$numrows = mysql_num_rows($query);
echo $say;/*
// $sayi=$connect->query("SELECT COUNT(*) FROM survey_user_answer");
//print_r($sayi);
?>