<?php
include('surveycode.php');
$limitv2=$_POST['commentNewCount'];
echo $limitv2; 
$anketCevap = $_POST["cevap"]; // Burada ajax ile yolladığımız veriyi çektiriyoruz. Ajax kısmında veri adını "cevap" olarak belirlemiştik.
$say =$_POST["sayi"];
$idv1=$_POST["idv1"];
$userid=$_POST["userid"];
						for($i=0;$i<$say;$i++){
							$idq = $dizi[$i]["idQ"];
							$cevap = 'cevap'.$i;
						$locsk = $_POST[$cevap];
						$ekleme = "INSERT INTO survey_user_answer(idS, idQ, userid, user_answer) VALUES ('" . $idv1 . "','" . $idq . "','" . $userid . "','" . $locsk . "')";
						if ($connect->query($ekleme) === TRUE) {
							// echo "eklendi";
						} else {
							echo "kayıt yapılmadı";
						}
					}
?>