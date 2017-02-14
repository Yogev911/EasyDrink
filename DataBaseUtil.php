<?php

/**
 * Created by PhpStorm.
 * User: Yogev Heskia
 * Date: 13/02/2017
 * Time: 22:31
 */
class cocktail
{
    public $cocktail_id;
    public $name;
    public $alcohol_id1;
    public $alcohol1_amount;
    public $alcohol_id2;
    public $alcohol2_amount;
    public $ice;
    public $glass_id;
    public $juice_id1;
    public $juice1_amount;
    public $juice_id2;
    public $juice2_amount;
    public $description;
    public $img_src;
    public $tumb_src;
    public $rate;
    public $trendy;
    public $our_picks;
//    public function displayVar() {
//        echo $this->var;
//    }
}

function connect()
{
    $dbhost = "182.50.133.146";
    $dbuser = "auxstudDB6c";
    $dbpass = "auxstud6cDB1!";
    $dbname = "auxstudDB6c";
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);//mysqli_connect is a newer version of mysql_connect. Its for mysql > ver 4.1.3

    //testing connection success
    if (mysqli_connect_errno()) {
        die("DB connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
    }
}

//$cocktailObj = new cocktail();

function disconnect()
{
    global $connection;
    mysqli_close($connection);

}

function getCocktailsByIdFromTbl($id, $TblName)
{
    global $connection;
    $i = 0;
    $cocktailsId = array();
    $cocktailObj = new cocktail();
    $cocktailObjArray = array();

    $query = "SELECT * FROM " . $TblName . " WHERE user_id = " . $id . "  ";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $cocktailsId[$i++] = $row["cocktail_id"];
        }
        //found all cocktails id by user id
        while ($i > 0) {
            //find cocktail id row from cocktail tbl
            $cocktailObjArray[] = getCocktailsByCocktailId($cocktailsId[$i]);
        }
        $i--;
    } else {
        echo $cocktailObjArray = null;
    }
    return $cocktailObjArray;
}

function getCocktailsByCocktailId($cocktailId)
{
    global $connection;
    $cocktailObj = new cocktail();
    $query = "SELECT * FROM tbl_219_cocktail WHERE cocktail_id = " . $cocktailId . " ";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $cocktailObj->cocktail_id = $row["cocktail_id"];
        $cocktailObj->name = $row["name"];
        $cocktailObj->alcohol_id1 = $row["alcohol_id1"];
        $cocktailObj->alcohol1_amount = $row["alcohol1_amount"];
        $cocktailObj->alcohol_id2 = $row["alcohol_id2"];
        $cocktailObj->alcohol2_amount = $row["alcohol2_amount"];
        $cocktailObj->ice = $row["ice"];
        $cocktailObj->glass_id = $row["glass_id"];
        $cocktailObj->juice_id1 = $row["juice_id1"];
        $cocktailObj->juice1_amount = $row["juice1_amount"];
        $cocktailObj->juice_id2 = $row["juice_id2"];
        $cocktailObj->juice2_amount = $row["juice2_amount"];
        $cocktailObj->description = $row["description"];
        $cocktailObj->img_src = $row["img_src"];
        $cocktailObj->tumb_src = $row["tumb_src"];
        $cocktailObj->rate = $row["rate"];
        $cocktailObj->trendy = $row["trendy"];
        $cocktailObj->our_picks = $row["our_picks"];
    }
    return $cocktailObj;
}

function setCocktailToDB($cocktailObj){
    global $connection;
    $query = "INSERT INTO tbl_219_cocktail 
(cocktail_id , name , alcohol_id1,alcohol1_amount,alcohol_id2,alcohol2_amount,ice,glass_id,juice_id1,juice1_amount,juice_id2,juice2_amount,description,img_src,tumb_src,rate,trendy,our_picks)VALUES 
(?,?,?);";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0) {

    }

}


?>

//find cocktail id row from cocktail tbl
//            $query = "SELECT * FROM tbl_219_cocktail WHERE cocktail_id = " . $cocktailsId[$i] . " ";
//            $result = mysqli_query($connection, $query);
//            if (mysqli_num_rows($result) > 0) {
//                $row = mysqli_fetch_assoc($result);
//                //for each cul get data to obj and put the obj inside the array
//                $cocktailObj->cocktail_id = $row["cocktail_id"];
//                $cocktailObj->name = $row["name"];
//                $cocktailObj->alcohol_id1 = $row["alcohol_id1"];
//                $cocktailObj->alcohol1_amount = $row["alcohol1_amount"];
//                $cocktailObj->alcohol_id2 = $row["alcohol_id2"];
//                $cocktailObj->alcohol2_amount = $row["alcohol2_amount"];
//                $cocktailObj->ice = $row["ice"];
//                $cocktailObj->glass_id = $row["glass_id"];
//                $cocktailObj->juice_id1 = $row["juice_id1"];
//                $cocktailObj->juice1_amount = $row["juice1_amount"];
//                $cocktailObj->juice_id2 = $row["juice_id2"];
//                $cocktailObj->juice2_amount = $row["juice2_amount"];
//                $cocktailObj->description = $row["description"];
//                $cocktailObj->img_src = $row["img_src"];
//                $cocktailObj->tumb_src = $row["tumb_src"];
//                $cocktailObj->rate = $row["rate"];
//                $cocktailObj->trendy = $row["trendy"];
//                $cocktailObj->our_picks = $row["our_picks"];
//
//                $cocktailObjArray[] = $cocktailObj;
