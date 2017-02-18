<?php
    include "DataBaseUtil.php";
    connect();
    if(!empty($_POST['id'])){
        $cocktailId = $_POST['id'];
        echo addToFavorites($cocktailId);
    }else{

        $query = "INSERT INTO  auxstudDB6c.tbl_219_cocktail (
                                name ,
                                alcohol_id1 ,
                                alcohol1_amount ,
                                alcohol_id2 ,
                                alcohol2_amount ,
                                ice ,
                                glass_id,
                                juice_id1 ,
                                juice1_amount ,
                                juice_id2 ,
                                juice2_amount 
                                )
                                VALUES (
                                   'cocktail".rand(1,100)."',".$_POST["alcoholOne"].",".$_POST["alcoholOneAmount"].",".$_POST['alcoholTwo'].",".$_POST['alcoholTwoAmount'].","
                                    .$_POST['ice'] . ",".$_POST['glassId'].","
                                    .$_POST['juiceOne'].",".$_POST['juiceOneAmount'].",".$_POST['juiceTwo'].",".$_POST['juiceTwoAmount'].")";

            if ( ($result = $connection->query($query)) === TRUE) {
                $lastId = $connection->insert_id;
                addToFavorites($lastId);
                echo $lastId;
            } else {
                echo $connection->error." error";
            }
    }
    disconnect();

?>