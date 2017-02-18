<?php
    include "DataBaseUtil.php";
    connect();
    if(!empty($_POST['id'])){
        $cocktailId = $_POST['id'];
        echo addToFavorites($cocktailId);
    }else{

        $query =
        "INSERT INTO  `auxstudDB6c`.`tbl_219_cocktail` (
        `cocktail_id` ,
`name` ,
`alcohol_id1` ,
`alcohol1_amount` ,
`alcohol_id2` ,
`alcohol2_amount` ,
`ice` ,
`glass_id` ,
`juice_id1` ,
`juice1_amount` ,
`juice_id2` ,
`juice2_amount` ,
`description` ,
`img_src` ,
`tumb_src` ,
`rate` ,
`trendy` ,
`our_picks`
)
VALUES (
    NULL ,  'test',  '77',  '7',  '7',  '7',  '7',  '7',  '7',  '7',  '77',  '7',  '7',  '7',  '7',  '77',  '7',  '7'
);";



    }
    disconnect();

?>