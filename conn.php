<?php
$servername="localhost";
$username="root";
$password="";
$dbname="test";
$connect=new mysqli($servername,$username,$password,$dbname);
$connect->set_charset("utf8");
if($connect->connect_error)
{
    die("Bağlatı Hatası");
}
?>