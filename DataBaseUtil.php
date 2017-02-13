<?php
/**
 * Created by PhpStorm.
 * User: Yogev Heskia
 * Date: 13/02/2017
 * Time: 22:31
 */

function connect(){
    $dbhost = "182.50.133.146";
    $dbuser = "auxstudDB6c";
    $dbpass = "auxstud6cDB1!";
    $dbname = "auxstudDB6c";
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);//mysqli_connect is a newer version of mysql_connect. Its for mysql > ver 4.1.3

    //testing connection success
    if(mysqli_connect_errno()) {
        die("DB connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
    }
}

function disconnect(){
    global $connection;
        mysqli_close($connection);
}

function getCocktailByIdFromTbl($id,$tbl){
    global $connection;
    $i=0;
    $query  = "SELECT * FROM '$tbl' WHERE user_id = '$id'  ";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $cocktails[$i++] =$row["id"];
        }
    } else {
        echo $cocktails[0]=null;
    }
    return $cocktails;
}



?>