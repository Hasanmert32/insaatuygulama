<!--Projede Görev Alanlar-->
<!--Hasan Mert Ermiş-->
<!--Muhammed Alperen Çil-->
<!--Bekir Can Özdemir-->

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="stil.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Kolon Moment Hesabı</title>
</head>
<body>
<div class="container">
    <div class="row justify-content-center"">
        <div class="col-md-8">
            <h2 class="text-center mt-3"><u>Kolon Moment Hesabı</u></h2>
            <form action="kolonmoment.php" method="post">
            <label for="basic-url">Fcd Parametresini Giriniz</label>
            <div class="input-group mb-3">
                <input type="number" class="form-control" name="Fcd"   aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2">mPa</span>
                </div>
            </div>
            <label for="basic-url" class="mt-2">Fyd Parametresini Giriniz</label>
            <div class="input-group mb-3">
                <input type="number" class="form-control" name="Fyd"  aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2">mPa</span>
                </div>
            </div>
            <label for="basic-url" class="mt-2">Kolonun 1. Kenar Uzunluğu</label>
            <div class="input-group mb-3">
                <input type="number" class="form-control" name="a"  aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2">mm</span>
                </div>

            </div>
            <label for="basic-url" class="mt-2">Kolonun 2. Kenar Uzunluğu</label>
            <div class="input-group mb-3">
                <input type="number" class="form-control" name="b"  aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2">mm</span>
                </div>

            </div>
            <label for="basic-url" class="mt-2">Donatının Alanını Giriniz</label>
            <div class="input-group mb-3">
                <input type="number" class="form-control" name="dAlan"  aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2">mm</span>
                </div>

            </div>

                <input class="btn btn-block buton" type="submit" value="Hesapla">
            </form>
            <?php
            error_reporting(0);
           //Gelen değerlerin mühendisten alınması.
            @$Fcd = $_POST["Fcd"];
            @$Fyd = $_POST["Fyd"];
            @$kenar1 = $_POST["a"];
            @$kenar2 = $_POST["b"];
            @$donatiAlan = $_POST["dAlan"];
            @$donatiOran = 0.01;
            @$pi = pi();

            $Acc = $kenar1 * $kenar2;


            $Ast = $donatiOran * (double)$Acc;

            @$n = ceil(($Ast) / (($pi * $donatiAlan * $donatiAlan) / (4))); //Çıkan sonuç her türlü yukarı tam sayı olarak yuvarlanır.

            //net Ast bulma hesabı
            $netAst = ($n * $pi * $donatiAlan * $donatiAlan) / (4);

            //Eksenal Yük Hesabı
            $Nor = (0.85) * (double)$Fcd * ($Acc - $Ast) + ((double)$Fyd * $Ast);


            ?>

            <table class="table table-bordered">
        <thead>
        <tr>

            <th scope="col">Değer Adı-İşlem Adı</th>
            <th scope="col">İşlemi</th>
            <th scope="col">Değeri</th>

        </tr>
        </thead>
        <tbody>
        <tr>

            <td scope="col">Fcd Değeri</td>
            <td scope="col">Kullanıcıdan Geliyor</td>
            <td scope="col"><?php echo $Fcd; ?>mPa</td>

        </tr>
        <tr>

            <td scope="col">Fyd Değeri</td>
            <td scope="col">Kullanıcıdan Geliyor</td>
            <td scope="col"><?php echo $Fyd; ?>mPa</td>

        </tr>
        <tr>

            <td scope="col">Kolonun 1. Kenarı</td>
            <td scope="col">Kullanıcıdan Geliyor</td>
            <td scope="col"><?php echo $kenar1; ?>mm</td>

        </tr>
        <tr>

            <td scope="col">Kolonun 2. Kenarı</td>
            <td scope="col">Kullanıcıdan Geliyor</td>
            <td scope="col"><?php echo $kenar2; ?>mm</td>

        </tr>
        <tr>

            <td scope="col">Donatı Alanı</td>
            <td scope="col">Kullanıcıdan Geliyor</td>
            <td scope="col"><?php echo $donatiAlan; ?>mm</td>

        </tr>
        <tr>

            <td scope="col">Donatı Oranı</td>
            <td scope="col">Sabit Değer (0.01)</td>
            <td scope="col"><?php echo $donatiOran; ?></td>

        </tr>
        <tr>

            <td scope="col">Acc</td>
            <td scope="col">kenar1 x kenar2</td>
            <td scope="col"><?php echo $Acc; ?>mm²</td>

        </tr>
        <tr>

            <td scope="col">Ast</td>
            <td scope="col">Donatı Oranı x Acc</td>
            <td scope="col"><?php echo $Ast; ?>mm²</td>

        </tr>
        <tr>

            <td scope="col">Donatı Sayısı (n)</td>
            <td scope="col">(Ast / pi x Donatı Alanı^2 ) / (4)</td>
            <td scope="col"><?php echo $n; ?></td>

        </tr>
        <tr>

            <td scope="col">Net Ast</td>
            <td scope="col">(Donatı Sayısı x pi x Donatı Alanı^2) / (4);</td>
            <td scope="col"><?php echo $netAst; ?>mm²</td>

        </tr>
        <tr>

            <td scope="col">Eksenal Yük (Nor)</td>
            <td scope="col">(0.85) x Fcd x (Acc - Ast) + (Fyd x Ast)</td>
            <td scope="col"><?php echo $Nor; ?>N</td>

        </tr>


        </tbody>
    </table>


</div>
</div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>