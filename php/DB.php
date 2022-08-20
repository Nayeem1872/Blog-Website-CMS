<?php
    // $DSN='mysql:host=localhost;dbname=cms';
    // $connectingDB=new PDO($DSN,'root','');
    $connectingDB = mysqli_connect("localhost", "root", "", "cms");

    if (!$connectingDB) {
        echo "Connection Failed";
    }
    else
    {
        echo"";
    }
   

?>