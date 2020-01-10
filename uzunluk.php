<!--Projede Görev Alanlar-->
<!--Hasan Mert Ermiş-->
<!--Muhammed Alperen Çil-->
<!--Bekir Can Özdemir-->
<!doctype html>
<html>

<head>
<title>Birim Çevirici - Uzunluk</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

</head>

<body>
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-8 ">

            <h2 class="text-center">Uzunluk Çevirici</h2>
            <form action="uzunluk.php" method="POST">
                <label for="basic-url" class="mt-2">Değeri Giriniz</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="val"  aria-describedby="basic-addon2">


                </div>


                <div class="form-group">
                    <label for="exampleFormControlSelect1">Birim Seçin</label>
                    <select name="from" class="form-control" id="exampleFormControlSelect1">
                        <option value=0>-Birim Seçin-</option>
                        <option value=1>Santimetre</option>
                        <option value=2>Metre</option>
                        <option value=3>Kilometre</option>
                        <option value=4>Feet</option>
                        <option value=5>Inch</option>
                        <option value=6>Miles</option>
                        <option value=7>Yards</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-block btn-warning text-white">Dönüştür</button>
            </form>
        </div>
    </div>
</div>
<?php
error_reporting(0);
if(isset($_POST['val']))
{
$val=$_POST['val'];

$from=$_POST['from'];
if($from==0)
{
echo '<script language="JavaScript">'."\n".'alert("Birim Seçiniz.");'."\n";
echo '</script>';
}
else
{

switch ($from)
{
case 1:
$fromu="Santimetre";$cm=1;$me=0.01;$km=0.00001;$ft=0.3280839;$in=0.39370078;$mi=0.000006213;$ya=0.010936132;break;
case 2:
$fromu="Metre";$cm=100;$me=1;$km=0.001;$ft=3.280839;$in=39.370078;$mi=0.00062137;$ya=1.0936132;break;
case 3:
$fromu="Kilometre";$cm=100000;$me=1000;$km=1;$ft=3280.839;$in=39370.078;$mi=0.6213;$ya=1093.6132;break;
case 4:
$fromu="Feet";$cm=30.48;$me=0.3048;$km=0.0003048;$ft=1;$in=12;$mi=0.00018939;$ya=0.33333;break;
case 5:
$fromu="Inches";$cm=2.54;$me=0.0254;$km=0.0000254;$ft=0.083333;$in=1;$mi=0.0000157828;$ya=0.027778;break;
case 6:
$fromu="Miles";$cm=160934.4;$me=1609.344;$km=1.609344;$ft=5280;$in=63360;$mi=1;$ya=1760;break;
case 7:
$fromu="Yards";$cm=91.44;$me=0.9144;$km=0.0009144;$ft=3;$in=36;$mi=0.000568181;$ya=1;break;
}



}
}
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                <tr class="text-center">

                    <th scope="col"><?php echo $val." ".$fromu." Değerinin Diğer Birimlere Dönüştürülmüş Hali";?></th>


                </tr>
                </thead>
                <tbody>
                <tr class="text-center">

                    <td scope="col"><?php echo (double)($val*$cm)." Santimetre";?></td>


                </tr>
                <tr class="text-center">

                    <td scope="col"><?php echo (double)($val*$me)." Metre";?></td>


                </tr>
                <tr class="text-center">

                    <td scope="col"><?php echo (double)($val*$km)." Kilometre"; ?></td>


                </tr>
                <tr class="text-center">

                    <td scope="col"><?php echo (double)($val*$in)." Inches";?></td>


                </tr>
                <tr class="text-center">

                    <td scope="col"><?php echo (double)($val*$ft)." Feet"; ?></td>


                </tr>
                <tr class="text-center">

                    <td scope="col"><?php echo (double)($val*$mi)." Miles" ?></td>

                </tr>
                <tr class="text-center">

                    <td scope="col"><?php echo (double)($val*$ya)." Yards";  ?></td>

                </tr>



                </tbody>
            </table>
        </div>
    </div>
</div>

</body>

</html>







