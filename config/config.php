<?php



try

    {

    //host
    define("HOST","localhost");

    //dbnname
    define("DBNAME","hotel-booking");

    //user
    define("USER","root");

    //password
    define("PASS","");

    $conn =new PDO("mysql:host=".HOST.";dbname=".DBNAME."",USER,PASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    }
    catch(PDOException $e){ 
        echo $e->getMessage();  
    }





