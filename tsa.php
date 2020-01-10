<!--Projede Görev Alanlar-->
<!--Hasan Mert Ermiş-->
<!--Muhammed Alperen Çil-->
<!--Bekir Can Özdemir-->
<?php 
error_reporting(0);
if(!isset($_POST)){
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Tepki Spektrumu Analizi</title>
  </head>
  <body>
    <div class="container">
    <div class="row justify-content-center">
    <div class="col-md-8 text-center">
    <h1>Tepki Spektrumu Analizi Yöntemi</h1>
          <form class="mt-5" action="tsa.php" method="post">
       
        <div class="form-group">
          <label for="exampleInputPassword1">Kütle (m)</label>
          <input name="m" min="0" step="0.1" type="number" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Ağırlık (W)</label>
          <input name="w" min="0" step="0.1" type="number" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">T Grafikte Nerde </label>
          <input name="t" min="0" step="0.1" type="number" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="form-group">
    <label for="exampleFormControlSelect1">Etkin Yer İvme Katsayısı (A0)</label>
    <select name="etkin" class="form-control" id="exampleFormControlSelect1">
    <option value="0.4">1. Derece</option>
      <option value="0.3">2. Derece</option>
      <option value="0.2">3. Derece</option>
      <option value="0.1">4. Derece</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Bina Önem Katsayısı (I)</label>
    <select name="onem" class="form-control" id="exampleFormControlSelect1">
      <option value="1.5">Deprem sonrası kullanımı gereken ve tehlikeli madde içeren binalar.</option>
      <option value="1.4">İnsanların uzun süreli ve yoğun olarak bulunduğu ve değerli eşyaların saklandığı binalar.</option>
      <option value="1.2">İnsanların kısa süreli ve yoğun olarak bulunduğu binalar.</option>
      <option value="1.0">Diğer binalar.</option>
      
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Zemin Grubu (Z)</label>
    <select name="zemin" class="form-control" id="exampleFormControlSelect1">
      <option value="z1">Z1</option>
      <option value="z2">Z2</option>
      <option value="z3">Z3</option>
      <option value="z4">Z4</option>
      
    </select>
  </div>
       <input type="submit" class="btn btn-block btn-danger btn-lg mt-3 mb-3" value="Hesapla">
        </form>                 
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

<?php 
}else{

 


 @$m = $_POST["m"];
 @$w = $_POST["w"];
 @$t = $_POST["t"];
 @$etkinYerIvme = $_POST["etkin"];
 @$binaOnemKatsayisi = $_POST["onem"];
 @$zeminGrubu = $_POST["zemin"];
 
 
if($zeminGrubu=="z1"){
  $ta = 0.1;
  $tb = 0.3;
}else if($zeminGrubu=="z2"){
  $ta = 0.15;
  $tb = 0.4;
}else if($zeminGrubu=="z3"){
  $ta = 0.15;
  $tb = 0.6;
}else if($zeminGrubu=="z4"){
  $ta = 0.2;
  $tb = 0.9;
}

if(@$t<=@$ta){
  @$st = 1+(1.5*(@$t/@$ta));
}else if((@$ta<@$t)&&(@$t<=@$tb)){
  $st = 2.5;
}else if(@$tb<@$t){
  $st =2.5*(pow((@$tb/@$t),0.8));
  
}

$at = $etkinYerIvme * $binaOnemKatsayisi * $st;
$saet = $at * 10;


$tabanKesmeKuvveti = $w * $at ;
$kesmeKuvveti = $saet * $m;



?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Tepki Spektrumu Analizi</title>
  </head>
  <body>
    <div class="container">
    <div class="row justify-content-center">
    <div class="col-md-8 text-center">
    <h1>Tepki Spektrumu Analizi Yöntemi</h1>
          <form class="mt-5" action="tsa.php" method="post">
       
        <div class="form-group">
          <label for="exampleInputPassword1">Kütle (m)</label>
          <input name="m" min="0" step="0.1" type="number" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Ağırlık (W)</label>
          <input name="w" min="0" step="0.1" type="number" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">T Grafikte Nerde </label>
          <input name="t" min="0" step="0.1" type="number" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="form-group">
    <label for="exampleFormControlSelect1">Etkin Yer İvme Katsayısı (A0)</label>
    <select name="etkin" class="form-control" id="exampleFormControlSelect1">
    <option value="0.4">1. Derece</option>
      <option value="0.3">2. Derece</option>
      <option value="0.2">3. Derece</option>
      <option value="0.1">4. Derece</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Bina Önem Katsayısı (I)</label>
    <select name="onem" class="form-control" id="exampleFormControlSelect1">
      <option value="1.5">Deprem sonrası kullanımı gereken ve tehlikeli madde içeren binalar.</option>
      <option value="1.4">İnsanların uzun süreli ve yoğun olarak bulunduğu ve değerli eşyaların saklandığı binalar.</option>
      <option value="1.2">İnsanların kısa süreli ve yoğun olarak bulunduğu binalar.</option>
      <option value="1.0">Diğer binalar.</option>
      
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Zemin Grubu (Z)</label>
    <select name="zemin" class="form-control" id="exampleFormControlSelect1">
      <option value="z1">Z1</option>
      <option value="z2">Z2</option>
      <option value="z3">Z3</option>
      <option value="z4">Z4</option>
      
    </select>
  </div>
  <input type="submit" class="btn btn-block btn-danger btn-lg mt-3 mb-3" value="Hesapla">
        </form>   
        <table class="table">
  <thead>
    <tr>
    
     
      <th scope="col">İşlem</th>
      <th scope="col">Sonucu</th>
    </tr>
  </thead>
  <tbody>
    <tr>
     
      <td>Taban Kesme Kuvveti</td>
      <td><?php echo @$tabanKesmeKuvveti;  ?></td>
    </tr>
    <tr>
     
     <td>Kesme Kuvveti</td>
     <td><?php echo @$kesmeKuvveti;  ?></td>
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
<?php 
}

?>