<?php 
if ($_GET) 
{
include("connect.php"); // veritabanı bağlantımızı sayfamıza ekliyoruz.

// id'si seçilen veriyi silme sorgumuzu yazıyoruz.
if ($connect->query("DELETE FROM survey_questions WHERE idQ =".(int)$_GET['idQ'])) 
{
    header("location:anketsoruduzenleme.php"); // Eğer sorgu çalışırsa ekle.php sayfasına gönderiyoruz.
}
}
?>