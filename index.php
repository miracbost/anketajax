<!doctype html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Soru Ekleme Sayfası</title>
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
</head>
<body>
    <div class="container my-5 shadow-lg p-3" id="omg">
        <div class="row">
            <div class="col-6">
                <h1>Anket Ekle </h1>
                <br>
                    <div class="form-group">
                        <label for="menu_title_tr"><b>1.Adım-- </b>Ankete İsim veriniz</label>
                        <input type="text" class="form-control" name="name" id="name"><br>
                    </div>
                    <div class="form-group">
                        <label for="menu_title_tr"><b>2.Adım-- </b> Sorunuzu Yazın</label>
                        <input type="text" class="form-control" name="questiontxt" id="questiontxt"><br>
                    </div>
                    <div class="form-group">
                        <label for="menu_title_tr"><b>3.Adım-- </b> Cevap Sayısı <small id="emailHelp" style="color: red;" class="form-text text-muted">(Kutunun içindeki simgeleri kullanın...)</small></label>
                        <input type="number" class="form-control" id="questionNumber" name="number" ><br>
                        <div id="result"> </div>
                        <input type="submit" class="btn btn-danger mt-5" id="buton"  data-bs-toggle="modal" data-bs-target="#myModal">
            </div>
        </div>
    </div>
    <script></script>
    <script src="http://code.jquery.com/jquery-3.0.0.min.js"></script>
<script>
	$(function() {
 
$("#buton").click(function() {
  var numberx=$("#questionNumber").val();
   var hstore = [""];

    for(var i=1;i<=numberx;i++)
    {
        var option=$("#option_"+i).val();
        if(option=="")
    {
        return $("#omg").html('<?php echo '<div align="center" class="alert alert-light" data-aos="flip-up" data-aos-duration="1000" role="alert" id="x"><img src="onaylanmadı.png" class="rounded-circle shadow-lg"  alt="Cinque Terre" width="100" height="100"> <br> <br><h3 style="color: black;">Başarısız</h3> <p>Cevaplarınız Başarılı Bir Şekilde Kayıt edilmedi. Lütfen Sorunuza cevap veya cevaplar ekleyiniz veriniz.</p> <br> <button type="button" class="btn btn-danger" data-bs-dismiss="modal">TAMAM</button> </div>' ?>');
    }
        hstore.push(option);
    }
    var name=$("#name").val();
    var questiontxt=$("#questiontxt").val(); 

    if(questiontxt=="")
    {
        return $("#omg").html('<?php echo '<div align="center" class="alert alert-light" data-aos="flip-up" data-aos-duration="1000" role="alert" id="x"><img src="onaylanmadı.png" class="rounded-circle shadow-lg"  alt="Cinque Terre" width="100" height="100"> <br> <br><h3 style="color: black;">Başarısız</h3> <p>Cevaplarınız Başarılı Bir Şekilde Kayıt edilmedi. Lütfen Sorunuzu yazınız.</p> <br> <button type="button" class="btn btn-danger" data-bs-dismiss="modal">TAMAM</button> </div>' ?>');
    }
    if(name=="")
    {
        return $("#omg").html('<?php echo '<div align="center" class="alert alert-light" data-aos="flip-up" data-aos-duration="1000" role="alert" id="x"><img src="onaylanmadı.png" class="rounded-circle shadow-lg"  alt="Cinque Terre" width="100" height="100"> <br> <br><h3 style="color: black;">Başarısız</h3> <p>Cevaplarınız Başarılı Bir Şekilde Kayıt edilmedi. Lütfen Ankete isim veriniz.</p> <br> <button type="button" class="btn btn-danger" data-bs-dismiss="modal">TAMAM</button> </div>' ?>');
    }
    if(numberx=="")
    {
        return $("#omg").html('<?php echo '<div align="center" class="alert alert-light" data-aos="flip-up" data-aos-duration="1000" role="alert" id="x"><img src="onaylanmadı.png" class="rounded-circle shadow-lg"  alt="Cinque Terre" width="100" height="100"> <br> <br><h3 style="color: black;">Başarısız</h3> <p>Cevaplarınız Başarılı Bir Şekilde Kayıt edilmedi. Lütfen Sorunuza cevap veya cevaplar ekleyiniz veriniz.</p> <br> <button type="button" class="btn btn-danger" data-bs-dismiss="modal">TAMAM</button> </div>' ?>');
    }
    
    $.ajax({ // Ajax methodunu başlattık .
        type: "POST", // Ajax methodunda veri gönderim tipini "POST" olarak belirledik.
        url: "haxj.php", //Ajax methodu ile çektiğimiz değerin POST edileceği sayfayı yazdık.
    data: {
        option:hstore,
        surveyname:name, 
        question:questiontxt, 
        numberOfoption:numberx
    },
 // Göndereceğimiz veriyi tanımladık. Php kısmında $_POST["cevap"] olarak çekeceksin
				success: function(e) { // Başarılı olduğunda dönecek cevabı yazdırdık
                    
					$("#omg").html('<?php echo '<div align="center" class="alert alert-light" data-aos="flip-up" data-aos-duration="1000" role="alert" id="x"><img src="onayla.png" class="rounded-circle shadow-lg"  alt="Cinque Terre" width="80" height="80"> <br> <br><h3 style="color: black;">Başarılı</h3> <p>Cevaplarınız Başarılı Bir Şekilde Kayıt edildi.</p> <br> <button type="button" class="btn btn-success" data-bs-dismiss="modal">TAMAM</button> </div>'; ?>');
				}
    });
});
});
</script>
</body>
</html>