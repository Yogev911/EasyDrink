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
    public $alcohol1;
    public $alcohol1_amount;
    public $alcohol2;
    public $alcohol2_amount;
    public $ice;
    public $glass;
    public $juice1;
    public $juice1_amount;
    public $juice2;
    public $juice2_amount;
    public $description;
    public $img_src;
    public $tumb_src;
    public $rate;
    public $trendy;
    public $our_picks;
    public $price;

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

class User
{
    public $user_id;
    public $pin_code;
    public $name;
    public $email;
    public $pic;
}

function connect(){
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
global $defaultUserId ;
$defaultUserId = 1234;

function disconnect()
{
    global $connection;
    mysqli_close($connection);

}

/**
 * @param $id user
 * @param $TblName table name
 * @return array|null of cocktails that has $id in the $TbName
 */
function getCocktailsByUserIdFromTbl($id, $TblName)
{
    global $connection;
    $i = 0;
    $cocktailsId = array();
    $cocktailObjArray = array();

    $query = "SELECT * FROM " . $TblName . " WHERE user_id = " . $id . "  ";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        while ( ($row = mysqli_fetch_assoc($result)) ) {
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

/**
 * @param $id user
 * @param $tblName table name
 * @return array|null of Thin cocktails that has $id in the $TbName
 */function getThinCocktailsByUserIdFromTbl($id, $tblName)
{
    global $connection;
    $cocktailArray = array();

    $query = 'SELECT * FROM '. $tblName .' INNER JOIN tbl_219_cocktail WHERE '.$tblName.'.cocktail_id = tbl_219_cocktail.cocktail_id AND user_id = '.$id;
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        while ( $row = mysqli_fetch_assoc($result)) {
            $cocktailArray[] = cocktailRowToThinObject($row);
        }
    } else {
        $cocktailArray = null;
    }

    return $cocktailArray;
}

/**
 * @param $TblName
 * @return array|null of cocktails in $Tblname
 */
function getThinCocktailsFromTbl($TblName)
{
    global $connection;
    $cocktailArray = array();

    $query = "SELECT * FROM " . $TblName ;
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $cocktailArray[] = cocktailRowToThinObject($row);
        }
    } else {
        $cocktailArray[] = null;
    }
    return $cocktailArray;
}


/**
 * @return array|null of all Thin cocktails That are trendy
 */
function getThinTrendyCocktails()
{
    global $connection;
    $cocktailArray = array();

    $query = "SELECT * FROM tbl_219_cocktail WHERE trendy = 1 ";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        while ( $row = mysqli_fetch_assoc($result) ) {
            $cocktailArray[] = cocktailRowToThinObject($row);
        }
    } else {
        $cocktailArray = null;
    }
    return $cocktailArray;
}



/**
 * @return array|null of all Thin cocktails That are Ourpicks
 */
function getThinOurpicksCocktails()
{
    global $connection;
    $cocktailArray = array();

    $query = "SELECT * FROM tbl_219_cocktail WHERE our_picks = 1 ";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $cocktailArray[] = cocktailRowToThinObject($row);
        }
    } else {
        $cocktailArray = null;
    }
    return $cocktailArray;
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
        $cocktailObj->alcohol1 = getAlcoholObjById($row["alcohol_id1"]);
        $cocktailObj->alcohol1_amount = $row["alcohol1_amount"];
        $cocktailObj->alcohol2 = getAlcoholObjById($row["alcohol_id2"]);
        $cocktailObj->alcohol2_amount = $row["alcohol2_amount"];
        $cocktailObj->ice = $row["ice"];
        $cocktailObj->glass = getGlassObjById($row["glass_id"]);
        $cocktailObj->juice1 = getJuiceObjById($row["juice_id1"]);
        $cocktailObj->juice1_amount = $row["juice1_amount"];
        $cocktailObj->juice2 = getJuiceObjById($row["juice_id2"]);
        $cocktailObj->juice2_amount = $row["juice2_amount"];
        $cocktailObj->description = $row["description"];
        $cocktailObj->img_src = $row["img_src"];
        $cocktailObj->tumb_src = $row["tumb_src"];
        $cocktailObj->rate = $row["rate"];
        $cocktailObj->trendy = $row["trendy"];
        $cocktailObj->our_picks = $row["our_picks"];
        $cocktailObj->price = $cocktailObj->alcohol1->price * $cocktailObj->alcohol1_amount/10 + $cocktailObj->alcohol2->price * $cocktailObj->alcohol2_amount/10 + $cocktailObj->juice1->price * $cocktailObj->juice1_amount/10 + $cocktailObj->juice2->price * $cocktailObj->juice2_amount/10;
    }
    return $cocktailObj;
}

function setCocktailToDB($cocktailObj)
{
    global $connection;
    $query = "INSERT INTO tbl_219_cocktail 
(cocktail_id , name , alcohol_id1,alcohol1_amount,alcohol_id2,alcohol2_amount,ice,glass_id,juice_id1,juice1_amount,juice_id2,juice2_amount,description,img_src,tumb_src,rate,trendy,our_picks)
VALUES 
($cocktailObj->cocktail_id,$cocktailObj->name,$cocktailObj->alcohol1->alcohol_id,$cocktailObj->alcohol1_amount,$cocktailObj->alcohol2->alcohol_id,$cocktailObj->alcohol2_amount,$cocktailObj->ice,$cocktailObj->glass->glass_id,$cocktailObj->juice1->juice_id ,$cocktailObj->juice1_amount,$cocktailObj->juice2->juice_id,$cocktailObj->juice2_amount,$cocktailObj->description,$cocktailObj->img_src,$cocktailObj->tumb_src,$cocktailObj->rate,$cocktailObj->trendy,$cocktailObj->our_picks);";
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

/**
 * @return array|null of all cocktails in DB
 */
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
            $cocktailObj->alcohol1 = getAlcoholObjById($row["alcohol_id1"]);
            $cocktailObj->alcohol1_amount = $row["alcohol1_amount"];
            $cocktailObj->alcohol2 = getAlcoholObjById($row["alcohol_id2"]);
            $cocktailObj->alcohol2_amount = $row["alcohol2_amount"];
            $cocktailObj->ice = $row["ice"];
            $cocktailObj->glass = getGlassObjById($row["glass_id"]);
            $cocktailObj->juice1 = getJuiceObjById($row["juice_id1"]);
            $cocktailObj->juice1_amount = $row["juice1_amount"];
            $cocktailObj->juice2 = getJuiceObjById($row["juice_id2"]);
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

/**
 * @return array|null of all Thin cocktails in DB
 */
function getThinCocktailObjArray()
{
    global $connection;
    $cocktailArray = array();

    $query = "SELECT * FROM tbl_219_cocktail ";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $cocktailArray[] = cocktailRowToThinObject($row);
        }
    } else {
        $cocktailArray = null;
    }
    return $cocktailArray;
}

function getAlcoholObjById($alcoholId)
{
    global $connection;
    $alcoholObj = new Alcohol();
    $query = "SELECT * FROM tbl_219_alcohol WHERE alcohol_id = " . $alcoholId . " ";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $alcoholObj->name = $row["name"];
        $alcoholObj->alcohol_id = $row["alcohol_id"];
        $alcoholObj->color = $row["color"];
        $alcoholObj->price = $row["price"];
        $alcoholObj->type = $row["type"];
        return $alcoholObj;
    } else {
        return null;
    }
}

function getJuiceObjById($juiceId)
{
    global $connection;
    $juiceObj = new Juice();
    $query = "SELECT * FROM tbl_219_juice WHERE juice_id = " . $juiceId . " ";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $juiceObj->name = $row["name"];
        $juiceObj->juice_id = $row["juice_id"];
        $juiceObj->color = $row["color"];
        $juiceObj->price = $row["price"];
        $juiceObj->type = $row["type"];
        return $juiceObj;
    } else {
        return null;
    }
}

function getGlassObjById($glassId)
{
    global $connection;
    $glassObj = new Glass();
    $query = "SELECT * FROM tbl_219_glass WHERE glass_id = " . $glassId . " ";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $glassObj->capacity = $row["capacity"];
        $glassObj->glass_id = $row["glass_id"];
        $glassObj->img_src = $row["img_src"];
        $glassObj->name = $row["name"];
        return $glassObj;
    } else {
        return null;
    }
}
function createCocktailObjFromParams($cocktail_id, $name, $alcohol1, $alcohol1_amount, $alcohol2, $alcohol2_amount, $ice, $glass_id, $juice1, $juice1_amount, $juice2, $juice2_amount, $description, $img_src, $tumb_src, $rate, $trendy, $our_picks, $price){
    $cocktailObj = new Cocktail();
    $cocktailObj->cocktail_id = $cocktail_id;
    $cocktailObj->name = $name;
    $cocktailObj->alcohol1 = getAlcoholObjById($alcohol1);
    $cocktailObj->alcohol1_amount = $alcohol1_amount;
    $cocktailObj->alcohol2 = getAlcoholObjById($alcohol2);
    $cocktailObj->alcohol2_amount = $alcohol2_amount;
    $cocktailObj->ice = $ice;
    $cocktailObj->glass = getGlassObjById($glass_id);
    $cocktailObj->juice1 = getJuiceObjById($juice1);
    $cocktailObj->juice1_amount = $juice2;
    $cocktailObj->juice2 = getJuiceObjById($juice1_amount);
    $cocktailObj->juice2_amount = $juice2_amount;
    $cocktailObj->description = $description;
    $cocktailObj->img_src = $img_src;
    $cocktailObj->tumb_src = $tumb_src;
    $cocktailObj->rate = $rate;
    $cocktailObj->trendy = $trendy;
    $cocktailObj->our_picks = $our_picks;
    $cocktailObj->price = $price;
}
class DrinkPay
{
    public $name;
    public $price;
    public $amount;
}
function getCocktailPrices($alcohol1=1, $alcohol2=1, $juice1=1, $juice2=1){


    global $connection;
    $DrinkObj = array();

    $query = "SELECT name,price FROM tbl_219_alcohol WHERE alcohol_id = ".$alcohol1."  or alcohol_id = ".$alcohol2."
UNION 
SELECT name,price FROM tbl_219_juice WHERE juice_id = ".$juice1." or juice_id = ".$juice2." ";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0) {
        while ( ($row = mysqli_fetch_assoc($result)) ) {
            $drink = new DrinkPay();
            $drink->name = $row["name"];
            $drink->price = $row["price"];
            $DrinkObj[] = $drink;
        }
        return $DrinkObj;
    } else {
        return null;
    }
}
//$row = mysqli_fetch_assoc($result);
//$cocktailObj->alcohol1->name = $row["name"];
//$cocktailObj->alcohol1->price = $row["price"];
//$row = mysqli_fetch_assoc($result);
//$cocktailObj->alcohol2->name = $row["name"];
//$cocktailObj->alcohol2->price = $row["price"];
//$row = mysqli_fetch_assoc($result);
//$cocktailObj->juice1->name = $row["name"];
//$cocktailObj->juice1->price = $row["price"];
//$row = mysqli_fetch_assoc($result);
//$cocktailObj->juice2->name = $row["name"];
//$cocktailObj->juice2->price = $row["price"];
function updateSavedCocktail($id,$glassId,$alcoholOne,$alcoholOneAmount,$alcoholTwo,$alcoholTwoAmount,$juiceOne,$juiceOneAmount,$juiceTwo,$juiceTwoAmount,$ice){
    global $connection;
//    $query = "INSERT INTO  auxstudDB6c.tbl_219_cocktail (user_id ,cocktail_id) VALUES (".$defaultUserId.",".$cocktailId.")";
//    $query = "UPDATE auxstudDB6c.tbl_219_cocktail
//              SET glass_id='.$glassId.' ,alcohol_id1='.$alcoholOne.' ,alcohol1_amount='.$alcoholOneAmount.' ,alcohol_id2='.$alcoholTwo.' ,alcohol2_amount='.$alcoholTwoAmount.' ,juice_id1='.$juiceOne.' ,juice1_amount='.$juiceOneAmount.' ,juice_id2='.$juiceTwo.' ,juice2_amount='.$juiceTwoAmount.' ,ice='.$ice.'
//              WHERE cocktail_id='.$id.' ";
    $query = "UPDATE auxstudDB6c.tbl_219_cocktail
              SET glass_id=".$glassId." ,alcohol_id1=".$alcoholOne." ,alcohol1_amount=".$alcoholOneAmount." ,alcohol_id2=".$alcoholTwo." ,alcohol2_amount=".$alcoholTwoAmount." ,juice_id1=".$juiceOne." ,juice1_amount=".$juiceOneAmount." ,juice_id2=".$juiceTwo." ,juice2_amount=".$juiceTwoAmount." ,ice=".$ice."
              WHERE cocktail_id=".$id." ";
    if ( $connection->query($query) === TRUE) {
        return "1";
    } else {
        return $connection->error;
    }
}

function getUserObj($userId){
    global $connection;
    $userObj = new User();
    $query = "SELECT * FROM tbl_219_users WHERE user_id = " . $userId . " ";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $userObj->email = $row["email"];
        $userObj->name = $row["name"];
        $userObj->pic = $row["pic"];
        $userObj->pin_code = $row["pin_code"];
        $userObj->user_id = $row["user_id"];
        return $userObj;
    } else {
        return null;
    }
}


/**
 * @param cocktailId $ The cocktail id which would like to add to favorites
 * using $defaultUserId the user's favorite
 */
function addToFavorites($cocktailId){
    global $connection;
    global $defaultUserId;
    $query = "INSERT INTO  auxstudDB6c.tbl_219_favorits (user_id ,cocktail_id) VALUES (".$defaultUserId.",".$cocktailId.")";

    if ( $connection->query($query) === TRUE) {
        return "1";
    } else {
        return $connection->error." error";
    }

}

/**
 * get DB row
 * returns Thin Cocktail
 */
function cocktailRowToThinObject($row){
    $cocktailObj = new Cocktail();
    $cocktailObj->cocktail_id = $row["cocktail_id"];
    $cocktailObj->name = $row["name"];
    $cocktailObj->alcohol1 =$row["alcohol_id1"];
    $cocktailObj->alcohol1_amount = $row["alcohol1_amount"];
    $cocktailObj->alcohol2 = $row["alcohol_id2"];
    $cocktailObj->alcohol2_amount = $row["alcohol2_amount"];
    $cocktailObj->ice = $row["ice"];
    $cocktailObj->glass = $row["glass_id"];
    $cocktailObj->juice1 = $row["juice_id1"];
    $cocktailObj->juice1_amount = $row["juice1_amount"];
    $cocktailObj->juice2 = $row["juice_id2"];
    $cocktailObj->juice2_amount = $row["juice2_amount"];
    $cocktailObj->description = $row["description"];
    $cocktailObj->img_src = $row["img_src"];
    $cocktailObj->tumb_src = $row["tumb_src"];
    $cocktailObj->rate = $row["rate"];
    $cocktailObj->trendy = $row["trendy"];
    $cocktailObj->our_picks = $row["our_picks"];
    return $cocktailObj;
}

/**
 * @param cocktailId $ The cocktail id which would like to add to favorites
 * using $defaultUserId the user's favorite
 */
function addToRecent($cocktailId){
    global $connection;
    global $defaultUserId;
    $query = "INSERT INTO  auxstudDB6c.tbl_219_recent (user_id ,cocktail_id) VALUES (".$defaultUserId.",".$cocktailId.")";

    if ( $connection->query($query) === TRUE) {
        return "1";
    } else {
        return $connection->error;
    }
}



?>
