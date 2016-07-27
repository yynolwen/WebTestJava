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
$db = new DBConnect();
$db->connectDB();
$nom = $db->test_input($data->nom);
$phone = $db->test_input($data->phone);
$email = $db->test_input($data->email);
$orga = $db->test_input($data->orga);
$userAnswers = json_decode( $data->userAnswers, true );
//$userAnswers = $db->test_input($data->userAnswers);
//print_r($userAnswers);


$person = new QuestionDao();
$AllQuestions = $person->getAllQuestions();

$score = 0;
for ($x = 0; $x < 10; $x++) {
    $j = $x+1;
    if($AllQuestions[$x]->getAnswer() == $userAnswers[$j])
    {
        $score++;
    }

}
echo $score;

$insert = $db->executeSQL("INSERT INTO Personne(nom,email,phone,organisation,score) VALUES('".$nom."', '".$email."','".$phone."' , '".$userAnswers."', '".$score."')");

$personId = $person->getPersonId($nom,$email);

if($row=$personId->fetch())
{
    $id = $row['id'];
}


for ($x = 1; $x <= 10; $x++) {


    $db->executeSQL("INSERT INTO Repondre(id_personne,id_question,id_reponse) VALUES('".$id."', '".$x."','".$userAnswers[$x]."')");

}

$db->closeConnection();