<?php
/**
 * Created by PhpStorm.
 * User: YongYanOspiea
 * Date: 21/07/2016
 * Time: 16:33
 */
require_once('../object/DBConnect.php');


$data = json_decode(file_get_contents("php://input"));
$login = new DBConnect("root","root");

$nom = $login->test_input($data->nom);
$phone = $login->test_input($data->phone);
$email = $login->test_input($data->email);
$orga = $login->test_input($data->orga);

$db = $login->connectDB($login->getUsername(),$login->getPassword());
$insert = $login->executeSQL($db,"INSERT INTO Personne(nom,email,phone,organisation,score) VALUES('".$nom."', '".$email."','".$phone."' , '".$orga."', '0')");

if ($insert->fetchColumn()){
    echo "111";
}
