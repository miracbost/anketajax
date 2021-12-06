<?php 
include("connect.php"); 
// veritabanı bağlantımızı sayfamıza ekliyoruz. 
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Veritabanı İşlemleri</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<?php 
$sorgu = $connect->query("SELECT * FROM survey_questions WHERE idQ =".(int)$_GET['idQ']); 
//id değeri ile düzenlenecek verileri veritabanından alacak sorgu
$sonuc = $sorgu->fetch_assoc();
 //sorgu çalıştırılıp veriler alınıyor
?>
<?php 
$sql = "SELECT * FROM survey_questions ORDER BY idQ ";
$result = mysqli_query($connect, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $dizi[] = $row; //cevaplar
}
///
if ($_POST) { // Post olup olmadığını kontrol ediyoruz.
    $cevap=$_POST['xa'];
   $toplucevap=json_encode($cevap, JSON_UNESCAPED_UNICODE);
    $soru=$_POST['soru'];;
    if ($cevap<>"" && $soru<>"") { // Veri alanlarının boş olmadığını kontrol ettiriyoruz.
        // Veri güncelleme sorgumuzu yazıyoruz.
        if ($connect->query("UPDATE survey_questions SET question_title = '$soru', answers = '$toplucevap' WHERE idQ =".$_GET['idQ'])) 
        {
            header("location:anketsoruduzenleme.php"); 
            // Eğer güncelleme sorgusu çalıştıysa ekle.php sayfasına yönlendiriyoruz.
        }
        else
        {
            echo "Hata oluştu"; // id bulunamadıysa veya sorguda hata varsa hata yazdırıyoruz.
        }
    }
}
$id=$sonuc['idS'];
?>
<div class="container">
<div class="col-md-6">
<form action="" method="post">
    <table class="table">
        <tr>
            <td>Soru</td>
            <td><input type="text" name="soru" class="form-control" value="<?php echo $sonuc['question_title']; 
                 // Veritabanından verileri çekip inputların içine yazdırıyoruz. ?>">
            </td>
        </tr>
        <?php
    
 $scn=$sonuc['answers'];
$id=$sonuc['idS'];

    $obj = json_decode($scn);
    foreach ($obj as $key => $lock) {
                        ?>
        <tr>
            <td>Cevapları</td>
            <td><input type="text" name="xa[]" class="form-control"value="<?php echo $lock; ?>" ></td>
        </tr>   <?php }?>
        <tr>
            <td></td>
          <td> <a href="anketsoruduzenleme.php?id=<?php echo $id ?>"  class="btn btn-danger mt-3">Anasayfaya dön</a></td>
        
            <td><input type="submit" class="btn btn-primary mt-2" value="Kaydet"></td>
        </tr>
    </table>
</form>
</div>
<div>
</body>
</html>