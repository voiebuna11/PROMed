<?php
define('ROOTPATH', __DIR__);
try{
    $conn = new PDO('sqlite:../promed.db');
}
catch(PDOException $e)
    {
    	echo "Conexiune esuata: " . $e->getMessage();
    }

?>