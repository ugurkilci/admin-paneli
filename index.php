<?php
include("../ayar.php");
// -Tekli- Veri Çekme
//Þimdi 1 Güvenli
$veri1	= $vt->prepare("select * from admin where id=?");
$veri1->execute(array("1"));
$islem1	= $veri1->fetch();
?>

<?php
	if ($_POST){
	$logo	= $_POST["logo"];
	$arkaplan	= $_POST["arkaplan"];
	$copyright	= $_POST["copyright"];
	$hakkimda	= $_POST["hakkimda"];
	
		$guncelle	= $vt->prepare("update admin set logo=?,arkaplan=?,copyright=?,hakkimda=? where id=?");
		$islem	= $guncelle->execute(array($logo,$arkaplan,$copyright,$hakkimda,"1"));
		
		if ($islem){
			echo "<font color='green' size='5'>Basariyla guncellendi. :)</font>";
			header("Refresh: 2; url= .");
		}
	}

?>
	<h1>Admin Paneli</h1>
	
	<!-- Menü -->
	<h4><a href="../" target="_blank">Siteyi G&ouml;r&uuml;nt&uuml;le</a> - <a href="." >Yenile</a></h4>
	<!-- /Menü -->
	
	<form action="" method="post">
	
	<!-- Logo -->
	Logo:<br>
	<input type="text" value="<?php echo $islem1["logo"]; ?>" name="logo"/><br>
	<!-- /Logo -->
	
	<!-- arkaplan -->
	Arkaplan:<br>
	<input type="text" value="<?php echo $islem1["arkaplan"]; ?>" name="arkaplan"/><br>
	<!-- /arkaplan -->
	
	<!-- copy -->
	Copyright:<br>
	<input type="text" value="<?php echo $islem1["copyright"]; ?>" name="copyright"/><br>
	<!-- /copy -->
	
	<!-- hakkimda -->
	Hakkimda:<br>
	<textarea name="hakkimda" style="margin: 0px; width: 172px; height: 137px;"><?php echo $islem1["hakkimda"]; ?></textarea>
	<!-- /hakkimda -->
	
	<!-- yolla -->
	<br><input type="submit" value="Kaydet"/><br>
	<!-- /yolla -->
	</form>
						