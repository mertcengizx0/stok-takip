<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<?php

function duyuru() 
{ include "vt_baglantisi.php";
$sql="SELECT * FROM duyurular";
$sorgu=mysqli_query($baglan,$sql);
while( $sonuc=mysqli_fetch_array($sorgu) ){
    	$duyuruSerit=$sonuc['duyuruTxt'];
		$duyuruTarih=$sonuc['duyuruTarih'];
		
		}
		echo "<marquee>".$duyuruSerit." | ".$duyuruTarih."</marquee>";
		mysqli_close($baglan);

}
;
?>