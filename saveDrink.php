<?php
    include "DataBaseUtil.php";
    connect();
    if(!empty($_POST['id'])){
        $cocktailId = $_POST['id'];
        echo addToFavorites($cocktailId);
    }else{





    }
    disconnect();

?>