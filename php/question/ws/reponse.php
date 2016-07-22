<?php
/**
 * Created by PhpStorm.
 * User: YongYanOspiea
 * Date: 22/07/2016
 * Time: 19:25
 */

require_once('../object/DBConnect.php');
require_once('../dao/QuestionDao.php');


$data = json_decode(file_get_contents("php://input"));
$login = new DBConnect("root","root");
$choices = $login->test_input($data->choices);
//$deChoices = json_decode($choices);

$db = $login->connectDB($login->getUsername(),$login->getPassword());

$person = new QuestionDao();
/*
for($i=0;$i<count($deChoices);$i++){
    $personId = $person->getPersonId($questionId,$choiceId);
    $login->executeSQL($db,"INSERT INTO Repondre(id_personne,id_question,id_reponse) VALUES('".$personId['id']."', '".$questionId."','".$choiceId."')");
}
*/

foreach( $choices as $questionId => $choiceId )
{
    $personId = $person->getPersonId($questionId,$choiceId);
    $login->executeSQL($db,"INSERT INTO Repondre(id_personne,id_question,id_reponse) VALUES('".$personId['id']."', '".$questionId."','".$choiceId."')");
}
