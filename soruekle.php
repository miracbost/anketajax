<!doctype html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Hello, world!</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        $(function() {
            $("#questionNumber").change(function() {
                $("#info").remove();
                $number = $(this).val();
                $("#result .form-group").remove();
                for ($i = 1; $i <= $number; $i++) {
                    $("#result").append('<div class="form-group row"><label class="col-sm-2 col-form-label">' + $i + ' .Şık</label><div class="col-sm-6"><input type="text" class="form-control mb-3" id="option_' + $i + '" name="option_' + $i + '"></div></div>').show('slow');
                }
            });
        });
    </script> 
    <?php
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="test";
    $connect=new mysqli($servername,$username,$password,$dbname);
    if($connect->connect_error)
    {
        die("Bağlatı Hatası");
    }
   
    ?>
    <?php 
     if(isset($_POST["buton"]))
     {
     $question=$_POST["y"];
     if (empty($question)) {
         die("Soru Boş olamaz!!");
     }
     $count=$_POST["x"];
     {
     $hstore=array('');
     for($i=1;$i<=$count;$i++)
   {
       if($i>0)
       {
         $option=$_POST["option_$i"];
         if (empty($option)) {
             die("Cevapsız soru olamaz!!");
         }
         if($i<=$count)
         {
         $hstore[]=$option;
         }
       }  
   }    
     unset($hstore[0]);
     $answers=json_encode($hstore, JSON_UNESCAPED_UNICODE);
     $ekle="INSERT INTO survey_questions(question_title,answer_count,answers,idS) VALUES ('".$question."','".$count."','".$answers."','".$id."')";
     if($connect->query($ekle)===TRUE)
     {
     //echo "eklendi";
     }
     else{
      echo "kayıt yapılmadı";
     } 
    
     } 
     }
     $id=$_GET["id"];
     
    ?>
   
</head>
<body>
    <div class="container my-5 shadow-lg p-3">
        <div class="row">
            <div class="col-6">
             <form action="" method="post">
                 <h2>Soru ekleme 
                 </h2>
                <br>
                    <div class="form-group">
                        <label for="menu_title_tr"><b>2.Adım-- </b> Sorunuzu Yazın</label>
                        <input type="text" class="form-control" name="y"><br>
                    </div>
                    <div class="form-group">
                        <label for="menu_title_tr"><b>3.Adım-- </b> Cevap Sayısı <small id="emailHelp" style="color: red;" class="form-text text-muted">(Kutunun içindeki simgeleri kullanın...)</small></label>
                        <input type="number" class="form-control" id="questionNumber" name="x"><br>
                        <div id="result"> </div>
                       <div>
                       <input type="submit" class="btn btn-success " name="buton">
            <a href="anketsoruduzenleme.php?id=<?php echo $id;?>" class="btn btn-primary ">Geri</a>
                       </div>
                
            </form>
               
               
            </div>
        </div>
    </div>
</body>
</html>