<?php
include("../model/dao/authordao.php"); 

$token = $_REQUEST["token"];

if ($token === "1234") {
	$author = new AuthorDAO();
	echo $author->getAll();
} else {
	echo "This is not a valid session";
}
?>