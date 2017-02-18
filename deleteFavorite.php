<?php
/**
 * Created by IntelliJ IDEA.
 * User: Oriamd
 * Date: 2/18/2017
 * Time: 7:44 PM
 */
include "DataBaseUtil.php";

connect();

echo deleteFromFavorites($_POST['id']);

disconnect();


