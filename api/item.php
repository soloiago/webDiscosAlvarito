<?php 
    require_once('../rb.php');   
    R::setup('mysql:host=localhost; dbname=discosalvarito','root','iagor');
    // R::setup('mysql:host=db419607717.db.1and1.com; dbname=db419607717','dbo419607717','webpersonal');


    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        // if(isset($_GET["term"])){
        //     $query=$_GET["term"];
        //     $filtered = R::getAll( 'select * from singlanguage where language like ?', 
        //         array('%'.$query.'%')
        //     );
        //     echo json_encode($filtered);
        // } else {
        //     $all = R::getAll( 'select * from singlanguage' );
        //     echo json_encode($all);
        // }
    } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $array = json_decode($_POST['data']);

        $title = $array->title[0];
        $discBean = R::dispense('disc');
        $discBean->title = $title;

        foreach ($array->singLanguage as $value) {
            $singlanguageBean = R::findOne('singlanguage',' language = ? ', array( $value ) );
            $discBean->sharedSignLanguage[] = $singlanguageBean;
        }

        //$singlanguage = 'chino'; //$_POST['singlanguage'];
        
        R::store($discBean);
    }
    
?>  