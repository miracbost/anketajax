<html>
<head>
	<meta charset="UTF-8" />
	<title>Ajax Post</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<title>Hello, world!</title>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="https://code.jquery.com/ui/1.11.0/jquery-ui.min.js"></script>
	<?php include("animation.php")?>
	
</head>
<body>
	<style>
		.x {
			box-shadow: 10px 10px 5px black;
		}
	</style>
	<div class="row">
		<div class="col-15 p-4 mb-8 my-6">
			<div id="results">
				<?php
				require_once('surveycode.php');
				$kacsoruvar = $connect->query("SELECT COUNT(*) FROM survey_questions WHERE idS =" . $idv1);
				$sonuc3 = $kacsoruvar->fetch_assoc();
				foreach ($sonuc3 as $key => $cevap) {
				}
				?>
				<?php
				$sayı = 0;
				if (empty($dizi[$sayı])) {
					$sabr++;
				}
				if ($sayı == 0) {
					echo '<script>
       $(document).ready(function(){
           myFunction();
          });
   </script>';
				}
				?>
				<div class="row">
					<div class="col-15 p-4 mb-8 my-6" id="omg">
						<?php
						$kacsoruvar = $connect->query("SELECT COUNT(*) FROM survey_questions WHERE idS =" . $idv1);
						$sonuc3 = $kacsoruvar->fetch_assoc();
						foreach ($sonuc3 as $key => $cevap) {
						}
						echo '<div class="alert alert-success">
     <strong>Bilgilendirme!</strong> Bulunduğunuz Ankette ' . $cevap . ' adet soru bulunmakta lütfen soruları cevaplamadan geçmeyiniz!.
   </div>';
						?>
						<h2 class="w3-container w3-top"><?php echo $diziv2[$sabr]["title"]; ?> </h2>
						<br>
						<?php
						$sql = "SELECT * FROM survey_questions WHERE idS =" . $idv1;
						$result = mysqli_query($connect, $sql);
						$i = 1;
						while ($sonuc2 = $result->fetch_assoc()) {
						?>
							<h4 class="w3-container w3-top "><?php echo $dizi[$sayı]["question_title"];  ?> </h4>
							<br>
							<?php
							$idq = $dizi[$sayı]["idQ"];
							$json = $dizi[$sayı]["answers"];
							$obj = json_decode($json);
							foreach ($obj as $key => $lock) {
							?>
								<div class="form-check mb-3" id="RadioArea">
									<input class="form-check-input" type="radio" name="gridRadios<?php echo $sayı; ?>" value="<?php echo $lock; ?>">
									<label class="form-label">
										<?php
										print $lock;
										?>
									</label>
								</div>
						<?php
							}
							$idler = array($sayı => $idq);
							$userid = "123";
							$sayı++;
						}
						?>
						<div>
							<input type="submit" value="Kaydet" class="btn btn-danger mt-3" id="buton" onsubmit="return validateForm()" name="buton">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
</body>
<script src="http://code.jquery.com/jquery-3.0.0.min.js"></script>
<script>
	$(function() {

		$("#buton").click(function() {
			<?php
			for ($i = 0; $i < $sayı; $i++) {
				$idq = $dizi[$i]["idQ"];
				echo 'var Deger' . $idq . ' = $("#RadioArea input[type=radio][name=gridRadios' . $i . ']:checked").val();' . "\n";
			}; ?>
			if ($('input[type=radio]:checked').length < <?= $sayı ?>) {
				
				return $("#omg").html('<?php echo '<div align="center" class="alert alert-light" data-aos="flip-up" data-aos-duration="1000" role="alert" id="x"><img src="onaylanmadı.png" class="rounded-circle shadow-lg"  alt="Cinque Terre" width="100" height="100"> <br> <br><h3 style="color: black;">Başarısız</h3> <p>Cevaplarınız Başarılı Bir Şekilde Kayıt edilmedi.</p> <br> <button type="button" class="btn btn-danger" data-bs-dismiss="modal">TAMAM</button> </div>' ?>');
			}
			// "anket" id değerine sahip inputun tıklanma olayını seçtik.
			// Seçilen inputun değerini aldık.
			$.ajax({ // Ajax methodunu başlattık .
				type: "POST", // Ajax methodunda veri gönderim tipini "POST" olarak belirledik.
				url: "test.php", //Ajax methodu ile çektiğimiz değerin POST edileceği sayfayı yazdık.
				data: {
					<?php
					for ($i = 0; $i < $sayı; $i++) {
						$idq = $dizi[$i]["idQ"];
						echo 'cevap' . $i . ': Deger' . $idq . ',' . "\n";
					};
					?>
					sayi: <?php echo $sayı ?>,
					idv1: <?php echo $idv1; ?>,
					idq: <?php echo $idq; ?>,
					userid: <?php echo $userid; ?>
				}, // Göndereceğimiz veriyi tanımladık. Php kısmında $_POST["cevap"] olarak çekeceksin
				success: function(e) { // Başarılı olduğunda dönecek cevabı yazdırdık
					$("#omg").html('<?php echo '<div align="center" class="alert alert-light" data-aos="flip-up" data-aos-duration="1000" role="alert" id="x"><img src="onayla.png" class="rounded-circle shadow-lg"  alt="Cinque Terre" width="80" height="80"> <br> <br><h3 style="color: black;">Başarılı</h3> <p>Cevaplarınız Başarılı Bir Şekilde Kayıt edildi.</p> <br> <button type="button" class="btn btn-success" data-bs-dismiss="modal">TAMAM</button> </div>'; ?>');
				}
			});
		});
	});
</script>
</html>