<?php
include("connect.php"); // veritabanı bağlantımızı sayfamıza ekliyoruz. 
?>
<!doctype html>
<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Hello, world!</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.11.0/jquery-ui.min.js"></script>
    <meta charset="utf-8">
    <title>Veritabanı İşlemleri</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>

</head>

<body>
    
    <div class="container my-5 shadow-lg p-3 mb-5 bg-body rounded">
        <div class="row">
            <div class="col-18">
            <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th >No</th>
                            <th >Questions</th>
                            <th >Answers </th>
                            <th >Contents </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                         $idv2 = $_GET["id"]; 
                        $connect->set_charset("utf8");
                        if (isset($_GET['id']) && ((int)$_GET['id'])) {
                            $gelenveri = $_GET['id'];
                        } else {
                            echo "<pre>" . "Bu anket numarasında soru bulunamadı!!!!";
                            header("Refresh: 0; url=admincontrolpage.php");
                            exit;
                        }
                        $sorgu = $connect->query("SELECT * FROM survey_questions WHERE idS =" . $gelenveri);
                        $sonuc = $sorgu->fetch_all();
                       
                        if ($sonuc == null) {
                            echo  '<div class="alert alert-danger">
                            <strong>HATA!</strong> Ankette soru bulunamadı!.
                          </div>';
                            echo
                            '<div  align="right">
                            <form action="admincontrolpage.php" method="post">
                                       <tr>
                     <td><a href="admincontrolpage.php?id=<?php echo $id; ?>" class="btn btn-primary">Geri</a> </td>
                     <td><a href="soruekle.php?id=' .  $idv2 . ' "class="btn btn-dark">Ankete Soru Ekle</a> </td> 
                                       </tr>
                      </div>
                      
                      ';
                            return;
                        } else {
                            foreach ($sonuc as $son) {
                                $id = $son['0'];
                                $soru = $son['2'];
                                $cevaps = $son['4'];
                                $obj = json_decode($cevaps);    
                        ?>
                                <tr>
                                    <td>
                                        <a href="duzenle.php?idQ=<?php echo $id; ?>" class="btn btn-secondary">Düzenle</a><br><br>
                                        <a href="sil.php?idQ=<?php echo $id; ?>" class="btn btn-danger">Sil</a>
                                    </td>
                                    <td><?php echo $id; ?></td>
                                    <td><?php echo $soru; ?></td>
                                        <?php
                                        $idv2 = $_GET["id"]; 
                                        
                                        foreach ($obj as $key => $cevaps) {
                                        
                                            $sorgu = $connect->query("SELECT COUNT(*) FROM survey_user_answer WHERE user_answer='$cevaps' and idQ='$id'");
                                            $sorguv1 = $connect->query("SELECT COUNT(*) FROM survey_user_answer WHERE idQ =" . $id);
                                            $sonuc3 = $sorgu->fetch_assoc();
                                            $sonuc = $sorguv1->fetch_assoc();
                                            foreach ($sonuc as $key => $cevapv2) {
                                               //echo $cevapv2;
                                            }
                                            foreach ($sonuc3 as $key => $cevap) {
                                               //echo $cevap;
                                            }
                                            
                                            if($cevapv2==0)
                                            {
                                                echo '<td><div class="alert alert-danger">
        <strong>HATA!</strong> Bu Soruya henüz cevap verilmemiş .
      </div> </td>';
      echo
      ' <table>
      <label> Exel olarak indir --></label>
      <a href="exel.php?id=' .  $idv2 . '" class="btn disabled" type="button"><img src="exel.png" alt="" width="30" height="30" srcset=""></a>
  <label> Pdf olarak indir --></label>
  <a href="pdf.php?id=' .  $idv2 . '" class="btn disabled" type="button "><img src="pdf.png" alt="" width="30" height="30" srcset=""></a>
    </table>
    <div align="right">
              <td><a href="admincontrolpage.php?id=<?php echo $id; ?>" class="btn btn-primary">Geri</a> </td>
              <td><a href="soruekle.php?id=' .  $idv2 . '" class="btn btn-dark">Ankete Soru Ekle</a> </td> 
  </div> 

';
      return;
                                            }
                                            $percentage_vote = round(($cevap/ $cevapv2) * 100);
                                            $progress_bar_class = '';
                                            if ($percentage_vote >= 40) {
                                                $progress_bar_class = 'progress-bar-success progress-bar-striped progress-bar-animated';
                                            } else if ($percentage_vote >= 25 && $percentage_vote < 40) {
                                                $progress_bar_class = 'progress-bar-info';
                                            } else if ($percentage_vote >= 10 && $percentage_vote < 25) {
                                                $progress_bar_class = 'progress-bar-warning progress-bar-striped progress-bar-animated';
                                            } else {
                                                $progress_bar_class = 'progress-bar-danger progress-bar-striped progress-bar-animated';
                                            }
                                        ?>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-7" align="center">
                                                <label><?php echo $cevaps . ""; ?></label>

                                            </div>
                                            <div class="col-md-10">
                                                <div class="progress">
                                                    <div class="progress-bar <?php echo $progress_bar_class; ?>" role="progressbar" aria-valuenow="<?php echo $percentage_vote; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $percentage_vote;       ?>%">
                                                        <?php echo $percentage_vote; ?> % programmer like <b><?php echo $percentage_vote; ?></b> PHP Framework
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <table>
            <label> Exel olarak indir --></label>
            <a href="exel.php?id=<?php echo $idv2; ?>" class="btn" type="button"><img src="exel.png" alt="" width="30" height="30" srcset=""></a>
        <label> Pdf olarak indir --></label>
        <a href="pdf.php?id=<?php echo $idv2; ?>" class="btn" type="button"><img src="pdf.png" alt="" width="30" height="30" srcset=""></a>
          </table>
          <div align="right">
                    <td><a href="admincontrolpage.php" class="btn btn-primary">Geri</a> </td>
                    <td><a href="soruekle.php?id=<?php echo $idv2; ?>" class="btn btn-dark">Ankete Soru Ekle</a> </td> 
        </div> 
  </div>
</form>
</body>
</html>