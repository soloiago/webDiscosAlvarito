<?php
include("basedao.php"); 

class AuthorDAO extends BaseDAO {
	private $table = "MUSICAUTHOR";

	public function __construct () {
		parent::__construct($this->table);
	}

	public function getAll() {
		return parent::getAll();
	}

}
?>