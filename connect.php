<?php include("animation.php")?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
<?php
$sayı=rand(0,20000);
$sayıv2=rand(0,23000);
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
    
    if(isset($_POST["buton"]))
    {   
        

    $title=$_POST["name"];
    if (empty($title)) {
      
     /*echo '<div class="modal" id="myModal">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content"> <div align="center" class="alert alert-light" data-aos="flip-up" data-aos-duration="1000" role="alert" id="x"><img src="uyarı.png" class="rounded-circle shadow-lg"  alt="Cinque Terre" width="100" height="100"> <br> <br><h3 style="color: black;">Başarısız</h3> <p>Cevaplarınız Başarılı Bir Şekilde Kayıt edilmedi. Lütfen Tüm Alanları Doldurduğunuza Emin Olun.</p> <br> <button type="button" class="btn btn-danger" data-bs-dismiss="modal">TAMAM</button> </div> </div> </div> </div>';
        return;*/
        
        }
    $question=$_POST["y"];
     if (empty($question)) {
       
      /*  echo '<div class="modal" id="myModal">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content"> <div align="center" class="alert alert-light" data-aos="flip-up" data-aos-duration="1000" role="alert" id="x"><img src="uyarı.png" class="rounded-circle shadow-lg"  alt="Cinque Terre" width="100" height="100"> <br> <br><h3 style="color: black;">Başarısız</h3> <p>Cevaplarınız Başarılı Bir Şekilde Kayıt edilmedi. Lütfen Tüm Alanları Doldurduğunuza Emin Olun.</p> <br> <button type="button" class="btn btn-danger" data-bs-dismiss="modal">TAMAM</button> </div> </div> </div> </div>';
        return;*/
    }
    $count=$_POST["x"];
    if  (empty($count)) {
       /* echo '<div class="modal" id="myModal">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content"> <div align="center" class="alert alert-light" data-aos="flip-up" data-aos-duration="1000" role="alert" id="x"><img src="uyarı.png" class="rounded-circle shadow-lg"  alt="Cinque Terre" width="100" height="100"> <br> <br><h3 style="color: black;">Başarısız</h3> <p>Cevaplarınız Başarılı Bir Şekilde Kayıt edilmedi. Lütfen Tüm Alanları Doldurduğunuza Emin Olun.</p> <br> <button type="button" class="btn btn-danger" data-bs-dismiss="modal">TAMAM</button> </div> </div> </div> </div>';
        return;*/
    }
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

    $ekle2="INSERT INTO survey_name(title,idS) VALUES ('".$title."','".$sayı."')";
    $ekle="INSERT INTO survey_questions(question_title,answer_count,answers,idS) VALUES ('".$question."','".$count."','".$answers."','".$sayı."')";
    if($connect->query($ekle)===TRUE)
    {
    //echo "eklendi";
    }
    else{
   //  echo "kayıt yapılmadı";
    } 
    if($connect->query($ekle2)===TRUE)
    {
    //echo "eklendi";
    }
    else{
    // echo "kayıt yapılmadı";
    } 
    if($connect->query($answers)===TRUE)
    {
    //echo "eklendi";
    }
    else{
    // echo "kayıt yapılmadı";
    } 
    }
    $sqlv2 ="SELECT * FROM survey_name ORDER BY idS ";
    $sql="SELECT * FROM survey_questions ORDER BY idQ ";
    $result2 = mysqli_query($connect, $sqlv2);
    $result = mysqli_query($connect, $sql);
    $dizi = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $dizi[] = $row; //cevaplar
    }
    print_r($row);
  // echo $dizi[0]["idS"];
    $diziv2 = array();
    while ($row2 = mysqli_fetch_assoc($result2)) {
        $diziv2[] = $row2; //anabaşlık
    }
    
} 