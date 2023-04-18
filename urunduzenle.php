<?php 
include("ek/vt_baglantisi.php");
ob_start();
session_start();

if(!isset($_SESSION["login"])){
    header("Location:giris.php");
}
$id = @$_GET['id'];
$icerik = mysqli_query($baglan, "SELECT * FROM urunler WHERE urunID = '$id'");		
$goster=mysqli_fetch_array($icerik);
// $goster = mysqli_fetch_array($sorgu);
if ($goster) {
  extract($goster);
}

?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title> Melody | Stok Takip  v1.0</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
	    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
<div class="panel panel-default">
                        
                        <div class="panel-body">
                            <ul class="nav nav-pills">
                                <li class=""><a href="index.php">Ürünler</a>
                                </li>
                                <li class=""><a href="#Depolar" data-toggle="tab">Depo Yönetimi</a>
                                </li>
                                
								<button class="right-div btn btn-primary"><a style="color:white;" href="cikis.php">Çıkış Yap</a>
                                </button>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="urunler">
                                    <h4>Ürün Düzenle</h4>
                                    <div class="table-responsive">
                                <div class="panel panel-danger">
									     
                        <div class="panel-body">
                            <form role="form" method="post" action="?duzenle">
                                        
                                 <div class="form-group">
                                            <label>Ürün Adı</label>
                                            <input class="form-control" name="adi" type="text" value="<?=$urunAdi;?>">
                                 </div>
								 <div class="form-group">
                                            <label>Barkod</label>
                                            <input class="form-control" name="barkod" type="text" value="<?=$urunBarkod;?>">
                                 </div>
								 <div class="form-group">
                                            <label>Stok Kodu</label>
                                            <input class="form-control" name="skodu" type="text" value="<?=$urunStokKodu;?>">
                                 </div>
								 <div class="form-group">
                                            <label>Ürün Adeti</label>
                                            <input class="form-control" name="adet" type="text" value="<?=$urunAdet;?>">
                                 </div>
								 <div class="form-group">
                                            <select name="depo">
												<?php
											$depocek = mysqli_query($baglan, "SELECT * FROM depolar");
											while($depoSirala=mysqli_fetch_array($depocek)){
											echo "<option value=".$depoSirala[0].">".$depoSirala[1]."</option>";
												
											}
											?>
											 </select>
											<p class="help-block">
										
											</p>
											<input class="form-control" name="uid" type="hidden" value="<?=$urunID;?>">
                                 </div>
                                            
                                
                                 
                                        <button type="submit" class="btn btn-danger">Kaydet </button>

                                    </form>
                            </div>
								
						
                       
                       
					<?php
					
					if(isset($_GET['duzenle'])){
					$uadi=$_POST['adi'];
					$barkod=$_POST['barkod'];
					$stokkodu=$_POST['skodu'];
					$adeti=$_POST['adet'];
					$depo=$_POST['depo'];
					$uid=$_POST['uid'];
						
					$guncelle=mysqli_query($baglan,"update urunler set urunAdi='$uadi',urunBarkod='$barkod',urunStokKodu='$stokkodu',urunAdet='$adeti',Depo='$depo' where urunID=$uid");	
if(isset($guncelle))
	header("location:index.php");
	
}else{
	
	
}
					
					
					?>


                            
<script src="assets/js/jquery-1.10.2.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/custom.js"></script>
   <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>

					</body>
</html>