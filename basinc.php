<!doctype html>
<html>

<head>
<title>Birim Çevirici - Basınç</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-8 ">

        <h2 class="text-center">Basınç Çevirici</h2>
            <form action="basinc.php" method="POST">
            <label for="basic-url" class="mt-2">Değeri Giriniz</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="val"  aria-describedby="basic-addon2">


            </div>
            <div class="form-group">
                    <label for="exampleFormControlSelect1">Birim Seçin</label>
                    <select name="from" class="form-control" id="exampleFormControlSelect1">
            <option value=0>-Birim Seçin-</option>
            <option value=1>ATM</option>
            <option value=2>PSI</option>
            <option value=3>KPA</option>
            
            <option value=5>BAR</option>
            
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
if(!preg_match('/^[0-9.]/',$val))
{
 echo '<script language="JavaScript">'."\n".'alert("Değer yok");'."\n";
 echo "window.location=('uzunluk.php');\n";
 echo '</script>';
}
$from=$_POST['from'];
if($from==0)
{
echo '<script language="JavaScript">'."\n".'alert("Lütfen seçim yapın.");'."\n";
echo '</script>';
}
else
{

switch ($from)
{
case 1:
$fromu="ATM";$atm=1;$psi=14.695950254024;$kpa=101.325010000438;$mbar=1013.25010000438;$bar=1.01325010000438;break;
case 2:
$fromu="PSI";$atm=0.068045957064;$psi=1;$kpa=6.8947572799992;$mbar=0.000000068947572799992;$bar=0.0689475727999919;break;
case 3:
$fromu="KPA";$atm=0.0098692316931;$psi=0.145037738007235;$kpa=1;$mbar=0.00000001;$bar=0.010;break;
case 5:
$fromu="BAR";$atm=0.98692316931;$psi=14.5037738007235;$kpa=100;$mbar=0.000001;$bar=1;break;
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

                    <td scope="col"><?php echo (double)($val*$psi)." PSI";?></td>


                </tr>
                <tr class="text-center">

                    <td scope="col"><?php echo (double)($val*$kpa)." KPA";?></td>


                </tr>
                <tr class="text-center">

                    <td scope="col"><?php echo (double)($val*$mbar)." MBAR"; ?></td>


                </tr>
                <tr class="text-center">

                    <td scope="col"><?php echo (double)($val*$bar)." BAR";?></td>


                </tr>
                



                </tbody>
            </table>
        </div>
    </div>
</div>


</body>

</html>