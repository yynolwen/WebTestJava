<?php
    require_once('../object/DBConnect.php');
    require_once('../object/Question.php');
    require_once ('../object/Choice.php');

	class QuestionDao {

        function __construct()
        {
        }

        public function getAllQuestions()
		{

		    $AllQuestions = array();
            $login = new DBConnect("root","root");
            $db = $login->connectDB($login->getUsername(),$login->getPassword());
			$questions = $login->executeSQL($db,"SELECT * FROM Questionnaire Where id<=10");
            foreach($questions as $row)
            {

                $question = new Question;
                $question->setId($row['id']);
                $question->setAnswer($row['id_correction']);
                $question->setSubject($row['question']);
                $choices = array();

                $reponses = $login->prepareSQL($db,"SELECT * FROM Choix where id_question = ?",array($row['id']));
                while($row2 = $reponses->fetch())
                {
                    $choice = new Choice;
                    $choice->setSubject($row2['reponse']);
                    $choice->setId($row2['id']);
                    $choice->setQuestionId($row2['id_question']);
                    array_push($choices,$choice);

                }
                $question->setChoices($choices);
                array_push($AllQuestions,$question);
            }

            //convert result to a list of question objects
			//charge those choices
            return $AllQuestions;
		}
	}

    $question = new QuestionDao();
    $result = $question->getAllQuestions();

#    print_r($result);


?>