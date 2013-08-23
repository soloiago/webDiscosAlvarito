<?php
class BaseDAO {
	private $table;

	public function __construct ($table) {
		$this->table = $table;
	}

	public function getAll() {
		$conexion = mysql_connect("localhost", "root", "iagor");
		mysql_select_db("discosalvarito", $conexion);

		$query = "SELECT * FROM ".$this->table." ORDER BY ID ASC";
		$resultQuery = mysql_query($query, $conexion) or die(mysql_error());
		$total = mysql_num_rows($resultQuery);

		$out = "";
		if ($total > 0) {
			while ($row = mysql_fetch_assoc($resultQuery)) {
				$out.= "<strong>".$row['NAME']."</strong><br>";
	   		}
		}

		return $out;
	}

}
?>