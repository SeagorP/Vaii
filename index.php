<?php
	require "stranka.php";
	$stranka= new Stranka();
?>
<!DOCTYPE html>
<html lang="zxx">
	<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8">
	<link rel="stylesheet" href="Styles/index.css" type="text/css">
	<title>REMP s.r.o. - Elektromontážne práce</title>
	<link rel="shortcut icon" href="Styles/Image/fawicon.png">
	<script>		
		function hide() {
			document.getElementById("pozadie").style.display = "none";
			document.getElementById("uloz").disabled = true;
		}
		
		function show() {
			document.getElementById("pozadie").style.display = "block";
			document.getElementById("nazov").value = "";
			document.getElementById("obsah").value = "";
		}
		function showUpdate(nazov, obsah, id) {
			document.getElementById("nazov").value = nazov;
			document.getElementById("obsah").value = obsah;
			document.getElementById("pozadie").style.display = "block";
			document.getElementById("update").value = id;
		}
		function checkLenght() {
			if(document.getElementById("nazov").value.length >= 4 && document.getElementById("obsah").value.length >= 50)
				document.getElementById("uloz").disabled = false;
			else
				document.getElementById("uloz").disabled = true;
		}
		function zmazUvod(id)
		{
			if (confirm("Chceš zmazať prvok ?"))
				window.location.assign("deleteUvod.php?zmazId="+id);
		}
	</script>
	</head>
	<body>
		<div class="vsetko">
			<div class="uvodneInf">
				<table>
					<tr>
						<td class="logo"><img src="Styles/Image/logo_small.png" alt="Logo firmy"></td>
						<td class="privitanie"> Vitajte na stránkach firmy REMP s.r.o. </td>
						<td class="kontakt"> zakladatel@remp.sk <br>
							rempPreVas@gmail.com <br>
							tel: +421 111 222 333
						</td>
					</tr>
				</table>
			</div>
			
			<div class="menu">
				<a href="#">Domov</a>
				<a href="#">Referencie</a>
				<a href="#">Partneri</a>
				<a href="galeria.html">Galéria</a>
				<a href="#">Kontakt</a>
				<a href="onas.html">O nás</a>
			</div>
			
			<div class="posuvneObrazky"></div><br>
			
			<span class="Zobraz" onclick="show()">Add</span>
			<div class="tabulkaInf">
				<?php $stranka->nacitajObsah(); ?>
			</div>
			
			<div> 
				<div class="dolneMenuUp">
					<a href="#">Domov</a>
					<a href="#">Referencie</a>
					<a href="#">Partneri</a>
					<a href="galeria.html">Galéria</a>
					<a href="#">Kontakt</a>
					<a href="onas.html">O nás</a>
				</div>
				<div class="dolneMenuDown"> Copyright © 2020- Peter Marek</div>
			</div>
		</div>
		
		<div id="pozadie">
			<div class="textOkno">
				<div class="textBoxTop"><span class="zatvor" onclick="hide()">x</span></div>
				<form class ="editBox" action="insertUvod.php" method="post">
					<input id="update" type="number" class="Save" value="0" name="update">
					<textarea oninput="checkLenght()" name="nazov" id="nazov" placeholder="Názov (min 4 znaky)"></textarea><br>
					<textarea oninput="checkLenght()" name="obsah" id="obsah" placeholder="Obsah (min 50 znakov)"></textarea><br>
					<input id="uloz" disabled type="submit" class="Save" value="Save">
				</form>
				<div class="textBoxBot"></div>
			</div>
		</div>
	</body>
</html>
