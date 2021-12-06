<?php
include('surveycode.php');
include("conn.php");
$sayı = rand(0, 20000);
$surveyname = $_POST["surveyname"];
$question = $_POST["question"];
$numberOfoption = $_POST["numberOfoption"];
$option = $_POST["option"];
unset($option[0]);

  if (empty($option)) {
    die("Cevapsız soru olamaz!!");
  }
    
$answers = json_encode($option, JSON_UNESCAPED_UNICODE);


$addName ="INSERT INTO survey_name(idS,title) VALUES ('".$sayı."','".$surveyname ."')";
$addQuestion ="INSERT INTO survey_questions(question_title,answer_count,answers,idS) VALUES ('" . $question . "','" . $numberOfoption . "','" . $answers . "','" . $sayı . "')";
if ($connect->query($addQuestion) === TRUE) {
  echo "eklendi";
} else {
  echo "kayıt yapılmadı";
}
if ($connect->query($addName) === TRUE) {
  echo "eklendi";
} else {
  echo "kayıt yapılmadı";
}
