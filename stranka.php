<?php

	class Stranka{
		private $db;
		
		function __construct()
		{
			$this->db = mysqli_connect("localhost", "root", "", "web_remp");
			if ($this->db == null)
				echo "Nepodarilo sa pripojit na databazu.";
		}
		
		function __destruct()
		{
			mysqli_close($this->db);
		}
	
		function nacitajObsah()
		{
			$result = mysqli_query($this->db, "select * from uvod");
			$counter = 0;
			while ($temp = mysqli_fetch_assoc($result))
			{
				if ($counter % 3 == 0)
					echo "<table><tr>";
					
				echo "<td>
					<div class=\"menuHead\">". $temp["meno"] ."</div> 
					<div>
						". $temp["obsah"] ."<br><br>
						<span class=\"Zobraz\" onclick=\"zmazUvod(".$temp["id"].")\">Delete</span>
						<span class=\"Zobraz\" onclick=\"showUpdate('".$temp["meno"]."','".$temp["obsah"]."', '".$temp["id"]."')\">Update</span>
					</div>
				</td>";
				
				$counter++;
				if ($counter % 3 == 0)
					echo "</tr></table>";
			}
			if ($counter % 3 != 0)
				echo "</tr></table>";
		}
		
		function pridajUvod($nazov, $obsah)
		{
			$result = mysqli_query($this->db, "insert into uvod (meno, obsah) values (\"".$nazov."\",\"".$obsah."\")");
			if (mysqli_affected_rows($this->db) < 1)
			{
				echo "<script>alert(\"Nepodarilo sa vlozit.\");</script>" ;
			}
		}
		function zmazUvod($id)
		{
			$result = mysqli_query($this->db, "DELETE FROM uvod WHERE id=".$id);
			if (mysqli_affected_rows($this->db) < 1)
			{
				echo "<script>alert(\"Nepodarilo sa zmazat.\");</script>";
			}
		}
		function updateUvod($nazov, $obsah, $id)
		{
			$result = mysqli_query($this->db, "update uvod set meno = \"".$nazov."\", obsah = \"".$obsah."\" where id = ".$id);
			if (mysqli_affected_rows($this->db) < 1)
			{
				echo "<script>alert(\"Nepodarilo sa upravit.\");</script>" ;
			}
		}
		
	};

	
?>