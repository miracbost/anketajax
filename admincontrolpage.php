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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5 shadow-lg p-3 mb-5 bg-body rounded">
        <div class="row">
            <div class="col-12">
                <div class="col-md-5">
                    <table class="table">
                        <tr>
                            <th>Anket İsmi</th>
                            <th></th>
                        </tr>
                        <?php
                        $connect->set_charset("utf8");
                        $sorgu2 = $connect->query("SELECT * FROM survey_name");
                        while ($sonuc2 = $sorgu2->fetch_assoc()) {
                            $name = $sonuc2['title'];
                            $id = $sonuc2['idS'];
                        ?>
                            <form action="anketsoruduzenleme.php" method="post">
                                <tr>
                                    <td><?php echo $name; ?></td>
                                    <td><a href="anketsoruduzenleme.php?id=<?php echo $id; ?>" class="btn btn-warning">Ayrıltılı Göster</a> </td>
                                </tr>
                            </form>
                        <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>