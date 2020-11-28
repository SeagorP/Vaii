<?php
	require "stranka.php";
	$stranka= new Stranka();
	
	if (isSet($_GET["zmazId"]))
	{
		$stranka->zmazUvod($_GET["zmazId"]);
	} else
	{
		echo "<script>alert(\"Zmazanie sa nepodarilo.\");</script>";
	}
	echo "<script>window.location.assign(\"index.php\")</script>";	
?>