<?php
	require "stranka.php";
	$stranka= new Stranka();
	
	if (isSet($_POST["nazov"]))
	{
		if (isSet($_POST["obsah"]))
		{
			if($_POST["update"] < 1)
				$stranka->pridajUvod($_POST["nazov"], $_POST["obsah"]);
			else
				$stranka->updateUvod($_POST["nazov"], $_POST["obsah"], $_POST["update"]);
		} else
		{
			echo "<script>alert(\"Vlozenie sa nepodarilo.\");</script>";
		}	
	} else
	{
		echo "<script>alert(\"Vlozenie sa nepodarilo.\");</script>";
	}
	echo "<script>window.location.assign(\"index.php\")</script>";	
?>