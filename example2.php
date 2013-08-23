<?php
require_once('rb.php');

//Second, we need to setup the database

//If you work on Mac OSX or Linux (or another UNIX like system)
//You can simply use this line:

R::setup('mysql:host=localhost; dbname=discosalvarito','root','iagor'); 

//create users
$users = array();
foreach (array('arul', 'jeff', 'mugunth', 'vish') as $name) {
    $user = R::dispense('user');
    $user->name = $name;
    $user->follows = R::dispense('follows');
    //create variables with specified names ($arul, $jeff, etc)
    $$name = $user;
    $users[] = $user;
}

//set relationships
$arul->follows->sharedUser = array($jeff);
$mugunth->follows->sharedUser = array($jeff, $arul);
$vish->follows->sharedUser = array($arul, $mugunth);

R::storeAll($users);

//print relationships
$id = 1;
while (true) {
    echo "-----------------------------------\n";
    $u = R::load('user', $id++);
    if (!$u->id) break;
    echo "$u->name follows " . count($u->follows->sharedUser) . " user(s) \n";
    if ($u->follows) {
        foreach ($u->follows->sharedUser as $f) {
            echo "    - $f->name \n";
        }
    }
    echo "\n$u->name is followed by "
        . R::getCell("SELECT COUNT(*) FROM follows_user WHERE user_id = $u->id")
        . " user(s) \n";
    foreach ($u->sharedFollows as $f) {
        $follower = array_shift($f->ownUser);
        echo "    - $follower->name \n";
    }
}
?>