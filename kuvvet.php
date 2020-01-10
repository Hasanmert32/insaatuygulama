<!--Projede Görev Alanlar-->
<!--Hasan Mert Ermiş-->
<!--Muhammed Alperen Çil-->
<!--Bekir Can Özdemir-->
<!doctype html>
<html>

<head>
<title>Birim Çevirici - Kuvvet</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-8 ">

        <h2 class="text-center">Kuvvet Çevirici</h2>
            <form action="kuvvet.php" method="POST">
            <label for="basic-url" class="mt-2">Değeri Giriniz</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="val"  aria-describedby="basic-addon2">


            </div>


                <div class="form-group">
                    <label for="exampleFormControlSelect1">Birim Seçin</label>
                    <select name="from" class="form-control" id="exampleFormControlSelect1">
                        <option value=1>Kilo Newton</option>
                        <option value=2>Hekto Newton</option>
                        <option value=3>Deka Newton</option>
                        <option value=4> Newton</option>
                        <option value=5>Desi Newton</option>
                        <option value=6>Santi Newton</option>
                        <option value=7>Mili Newton</option>
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
 echo "window.location=('kuvvet.php');\n";
 echo '</script>';
}
$from=$_POST['from'];
if($from==0)
{
echo '<script language="JavaScript">'."\n".'alert("Lütfen Değer Girin.");'."\n";
echo '</script>';
}
else
{

switch ($from)
{
    case 1:
        $fromu="Kilo Newton";$kn=1;$hn=10;$dn=100;$n=1000;$den=10000;$sn=100000;$ml=1000000;break;
        case 2:
        $fromu="Hekto Newton";$kn=0.1;$hn=1;$dn=10;$n=100;$den=1000;$sn=10000;$ml=100000;break;
        case 3:
        $fromu="Deka Newton";$kn=0.01;$hn=0.1;$dn=1;$n=10;$den=100;$sn=1000;$ml=10000;break;
        case 4:
        $fromu="Newton";$kn=0.001;$hn=0.01;$dn=0.1;$n=1;$den=10;$sn=100;$ml=1000;break;
        case 5:
        $fromu="Desi Newton";$kn=0.0001;$hn=0.001;$dn=0.01;$n=0.1;$den=1;$sn=10;$ml=100;break;
        case 6:
        $fromu="Santi Newton";$kn=0.00001;$hn=0.0001;$dn=0.001;$n=0.01;$den=0.1;$sn=1;$ml=10;break;
        case 7:
        $fromu="Mili Newton";$kn=0.00001;$hn=0.0001;$dn=0.001;$n=0.001;$den=0.01;$sn=0.1;$ml=1;break;

 
 }

}}

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

                    <td scope="col"><?php echo (double)($val*$kn)." Kilo Newton";?></td>


                </tr>
                <tr class="text-center">

                    <td scope="col"><?php echo (double)($val*$hn)." Hekto Newton";?></td>


                </tr>
                <tr class="text-center">

                    <td scope="col"><?php echo (double)($val*$dn)." Deka Newton"; ?></td>


                </tr>
                <tr class="text-center">

                    <td scope="col"><?php echo (double)($val*$n)." Newton";?></td>


                </tr>
                <tr class="text-center">

                    <td scope="col"><?php echo (double)($val*$den)." Desi Newton"; ?></td>


                </tr>
                <tr class="text-center">

                    <td scope="col"><?php echo (double)($val*$sn)." Santi Newton" ?></td>

                </tr>
                <tr class="text-center">

                    <td scope="col"><?php echo (double)($val*$ml)." Mili Newton";  ?></td>

                </tr>



                </tbody>
            </table>
        </div>
    </div>
</div>


</body>

</html>