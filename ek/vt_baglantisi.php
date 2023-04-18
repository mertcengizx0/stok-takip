<?php

//veritabanı bağlantısı
$server ="localhost";
$username = "root";
$pasword = "";
$database = "stok";

$baglan = mysqli_connect($server,$username,$pasword,$database);
mysqli_set_charset($baglan, "UTF8");

//Site Sabitleri
$query= "SELECT * FROM ayarlar";
$ayarcek=mysqli_query($baglan,$query);
$ayar=mysqli_fetch_array($ayarcek);
extract($ayar);
$baslik=$sayfaBaslik;
$alt=$copright;


?>
