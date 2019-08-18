<?php
include 'database.php';

class query{
    //Show data
    function tampilData($data){
        $data = mysqli_query($db, "SELECT * FROM `$data`;");
        while($d = mysqli_fetch_assoc($data)){
            $hasil[] = $d;
        }
        return $hasil;
    }
}
    
$query = new query(); 
    
var_dump($query->tampilData('User')); 
?>