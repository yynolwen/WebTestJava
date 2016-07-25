<?php
/**
 * Created by PhpStorm.
 * User: YongYanOspiea
 * Date: 21/07/2016
 * Time: 16:33
 */
require_once('../object/DBConnect.php');
require_once('../dao/QuestionDao.php');

$data = json_decode(file_get_contents("php://input"));
$login = new DBConnect("root","root");
$nom = $login->test_input($data->nom);
$phone = $login->test_input($data->phone);
$email = $login->test_input($data->email);
$orga = $login->test_input($data->orga);
$Answers = json_decode( $data->cx, true );

$person = new QuestionDao();
$AllQuestions = $person->getAllQuestions();

$score = 0;
for ($x = 0; $x < 10; $x++) {
    $j = $x+1;
    if($AllQuestions[$x]->getAnswer() == $Answers[$j])
    {
        $score++;
    }

}


$db = $login->connectDB($login->getUsername(),$login->getPassword());

$insert = $login->executeSQL($db,"INSERT INTO Personne(nom,email,phone,organisation,score) VALUES('".$nom."', '".$email."','".$phone."' , '".$orga."', '".$score."')");



$personId = $person->getPersonId($nom,$email);
if($row=$personId->fetch())
{
    $id = $row['id'];
}


for ($x = 1; $x <= 10; $x++) {


        $login->executeSQL($db,"INSERT INTO Repondre(id_personne,id_question,id_reponse) VALUES('".$id."', '".$x."','".$Answers[$x]."')");

}

