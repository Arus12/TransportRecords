<?php
/**
* @author Jan Černý
*/
require "Loader.php";
spl_autoload_register('Loader::load_php');
if($_REQUEST["what"] == 0){
    $result = new add($_POST["spoj"], $_POST["prijezd"], $_POST["odjezd"], $_POST["mesto"]);
    if($result){
        header("Location:../index.php"); 
    }else{
        echo("Error");
    }
}else if($_REQUEST["what"] == 1){
    $result = $obj = new add($_POST["cislo_spoj"], null, null, null);
    if($result){
        header("Location:../index.php"); 
    }else{
        echo("Error");
    }
}else if($_REQUEST["what"] == 2){
    $result = $obj = new delete();
    if($result){
        header("Location:../index.php"); 
    }else{
        echo("Error");
    }
}else if($_POST['what'] == 3){
    $obj = new load();
    return $obj->load_content();
}
?>