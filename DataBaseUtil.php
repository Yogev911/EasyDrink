<?php

/**
 * Created by PhpStorm.
 * User: Yogev Heskia
 * Date: 13/02/2017
 * Time: 22:31
 */
class Cocktail
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
}

class Alcohol
{
    public $alcohol_id;
    public $name;
    public $price;
    public $type;
    public $color;
}

class Juice
{
    public $juice_id;
    public $name;
    public $price;
    public $type;
    public $color;
}

class Glass
{
    public $glass_id;
    public $capacity;
    public $name;
    public $img_src;
}


function connect()

{
    global $connection;
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

// get the cocktail of the specific user id from specific table like Foryou219/recent/favorits etc...
function getCocktailsByUserIdFromTbl($id, $TblName)
{
    global $connection;
    $i = 0;
    $cocktailsId = array();
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
            $i--;
        }
    } else {
        $cocktailObjArray = null;
    }
    return $cocktailObjArray;
}

function getCocktailsByCocktailId($cocktailId)
{
    global $connection;
    $cocktailObj = new Cocktail();
    $query = "SELECT * FROM tbl_219_cocktail WHERE cocktail_id = " . $cocktailId . " ";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $cocktailObj->cocktail_id = $row["cocktail_id"];
        $cocktailObj->name = $row["name"];
        $cocktailObj->alcohol_id1 = getAlcoholNameById($row["alcohol_id1"]);
        $cocktailObj->alcohol1_amount = $row["alcohol1_amount"];
        $cocktailObj->alcohol_id2 = getAlcoholNameById($row["alcohol_id2"]);
        $cocktailObj->alcohol2_amount = $row["alcohol2_amount"];
        $cocktailObj->ice = $row["ice"];
        $cocktailObj->glass_id = $row["glass_id"];
        $cocktailObj->juice_id1 = getJuiceNameById($row["juice_id1"]);
        $cocktailObj->juice1_amount = $row["juice1_amount"];
        $cocktailObj->juice_id2 = getJuiceNameById($row["juice_id2"]);
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

function setCocktailToDB($cocktailObj)
{
    global $connection;
    $query = "INSERT INTO tbl_219_cocktail 
(cocktail_id , name , alcohol_id1,alcohol1_amount,alcohol_id2,alcohol2_amount,ice,glass_id,juice_id1,juice1_amount,juice_id2,juice2_amount,description,img_src,tumb_src,rate,trendy,our_picks)
VALUES 
($cocktailObj->cocktail_id,$cocktailObj->name,$cocktailObj->alcohol_id1,$cocktailObj->alcohol1_amount,$cocktailObj->alcohol_id2,$cocktailObj->alcohol2_amount,$cocktailObj->ice,$cocktailObj->glass_id,$cocktailObj->juice_id1,$cocktailObj->juice1_amount,$cocktailObj->juice_id2,$cocktailObj->juice2_amount,$cocktailObj->description,$cocktailObj->img_src,$cocktailObj->tumb_src,$cocktailObj->rate,$cocktailObj->trendy,$cocktailObj->our_picks);";
    mysqli_query($connection, $query);
}

function getGlassObjArray()
{
    global $connection;
    $glassArray = array();

    $query = "SELECT * FROM tbl_219_glass ";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $glassObj = new Glass();
            $glassObj->glass_id = $row["glass_id"];
            $glassObj->capacity = $row["capacity"];
            $glassObj->name = $row["name"];
            $glassObj->img_src = $row["img_src"];
            $glassArray[] = $glassObj;
        }
    } else {
        $glassArray = null;
    }
    return $glassArray;
}

function getAlcoholObjArray()
{
    global $connection;
    $alcoholArray = array();

    $query = "SELECT * FROM tbl_219_alcohol ";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $alcoholObj = new Alcohol();
            $alcoholObj->alcohol_id = $row["alcohol_id"];
            $alcoholObj->name = $row["name"];
            $alcoholObj->price = $row["price"];
            $alcoholObj->type = $row["type"];
            $alcoholObj->color = $row["color"];
            $alcoholArray[] = $alcoholObj;
        }
    } else {
        $alcoholArray = null;
    }
    return $alcoholArray;
}

function getJuiceObjArray()
{
    global $connection;
    $juiceArray = array();


    $query = "SELECT * FROM tbl_219_juice ";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $juiceObj = new Juice();
            $juiceObj->juice_id = $row["juice_id"];
            $juiceObj->name = $row["name"];
            $juiceObj->price = $row["price"];
            $juiceObj->type = $row["type"];
            $juiceObj->color = $row["color"];
            $juiceArray[] = $juiceObj;
        }
    } else {
        $juiceArray = null;
    }
    return $juiceArray;
}

function getCocktailObjArray()
{
    global $connection;
    $cocktailArray = array();

    $query = "SELECT * FROM tbl_219_cocktail ";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $cocktailObj = new Cocktail();
            $cocktailObj->cocktail_id = $row["cocktail_id"];
            $cocktailObj->name = $row["name"];
            $cocktailObj->alcohol_id1 = getAlcoholNameById($row["alcohol_id1"]);
            $cocktailObj->alcohol1_amount = $row["alcohol1_amount"];
            $cocktailObj->alcohol_id2 = getAlcoholNameById($row["alcohol_id2"]);
            $cocktailObj->alcohol2_amount = $row["alcohol2_amount"];
            $cocktailObj->ice = $row["ice"];
            $cocktailObj->glass_id = $row["glass_id"];
            $cocktailObj->juice_id1 = getJuiceNameById($row["juice_id1"]);
            $cocktailObj->juice1_amount = $row["juice1_amount"];
            $cocktailObj->juice_id2 = getJuiceNameById($row["juice_id2"]);
            $cocktailObj->juice2_amount = $row["juice2_amount"];
            $cocktailObj->description = $row["description"];
            $cocktailObj->img_src = $row["img_src"];
            $cocktailObj->tumb_src = $row["tumb_src"];
            $cocktailObj->rate = $row["rate"];
            $cocktailObj->trendy = $row["trendy"];
            $cocktailObj->our_picks = $row["our_picks"];
            $cocktailArray[] = $cocktailObj;
        }
    } else {
        $cocktailArray = null;
    }
    return $cocktailArray;
}

function getAlcoholNameById($alcoholId)
{
    global $connection;
    $nothing = "null";
    $query = "SELECT * FROM tbl_219_alcohol WHERE alcohol_id = " . $alcoholId . " ";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row["name"];
    } else {
        return $nothing;
    }
}

function getJuiceNameById($juiceId)
{
    global $connection;
    $nothing = "null";
    $query = "SELECT * FROM tbl_219_juice WHERE juice_id = " . $juiceId . " ";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row["name"];
    } else {
        return $nothing;
    }
}

//function setJuiceToDB($juiceObj)
//{
//    global $connection;
//    $query = "INSERT INTO tbl_219_juice
//(juice_id ,name ,price ,type, color)
//VALUES
//($juiceObj->juice_id,$juiceObj->name,$juiceObj->price,$juiceObj->type,$juiceObj->color);";
//    mysqli_query($connection, $query);
//}


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

?>
