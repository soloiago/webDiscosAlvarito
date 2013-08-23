<?php 
	require_once('../rb.php');   
	R::setup('mysql:host=localhost; dbname=discosalvarito','root','iagor');
	// R::setup('mysql:host=db419607717.db.1and1.com; dbname=db419607717','dbo419607717','webpersonal');


	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		if(isset($_GET["term"])){
			$query=$_GET["term"];
            $filtered = 0;

            switch ($_GET["column"]) {
                case 'singLanguage':
                    $filtered = R::getAll( 'select * from singlanguage where language like ?', 
                        array('%'.$query.'%')
                    );
                    break;
                
                default:
                    break;
            }
    		
			echo json_encode($filtered);
		} else {
			$all = R::getAll( 'select * from singlanguage' );
			echo json_encode($all);
		}
	} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$bean = R::dispense('singlanguage');
		//$bean->value = $_POST['language'];
		$bean->language = $_POST['language'];
		R::store($bean);
	}
	
?> 	