<?php
    require_once('../object/DBConnect.php');
    require_once('../object/Question.php');
    require_once ('../object/Choice.php');

	class QuestionDao
    {
        private $dbConnect;

        function __construct()
        {
            $this->dbConnect = new DBConnect();
        }

        public function getAllQuestions()
        {

            $AllQuestions = array();

            $this->dbConnect->connectDB();
            //$questions = $this->dbConnect->executeSQL("SELECT * FROM Questionnaire Where id<=10");
            $questionsAndAnswers = $this->dbConnect->executeSQL("SELECT jc_Choix.id as id_choix, jc_Choix.id_question as id_question, jc_Choix.reponse as choix_reponse,  jc_Questionnaire.id_correction as id_correction, jc_Questionnaire.question as subject  FROM jc_Questionnaire LEFT JOIN jc_Choix ON jc_Questionnaire.id = jc_Choix.id_question where jc_Questionnaire.id<=10 order by jc_Questionnaire.id");

            $x = 1; $y = 0;

            $choices = array();

            foreach($questionsAndAnswers as $row)
            {

                if($row['id_question'] == $x)
                {
                    $y++;

                    $choice = new Choice;
                    $choice->setSubject($row['choix_reponse']);
                    $choice->setId($row['id_choix']);
                    $choice->setQuestionId($row['id_question']);
                    array_push($choices, $choice);
                }

                if($y==4)
                {
                    $x++;
                    $y = 0;
                    $question = new Question;
                    $question->setId($row['id_question']);
                    $question->setAnswer($row['id_correction']);
                    $question->setSubject($row['subject']);



                    $question->setChoices($choices);
                    $choices = array();

                    array_push($AllQuestions, $question);

                }




            }

/*
            foreach ($questions as $row) {
                $question = new Question;
                $question->setId($row['Questionnaire.id']);
                $question->setAnswer($row['id_correction']);
                $question->setSubject($row['question']);
                $choices = array();

                $reponses = $this->dbConnect->prepareAndExecuteSQL("SELECT * FROM Choix where id_question = ?", array($row['id']));
                while ($row2 = $reponses->fetch()) {
                    $choice = new Choice;
                    $choice->setSubject($row2['reponse']);
                    $choice->setId($row2['id']);
                    $choice->setQuestionId($row2['id_question']);
                    array_push($choices, $choice);

                }
                $question->setChoices($choices);
                array_push($AllQuestions, $question);
            }*/
            $this->dbConnect->closeConnection();

            //convert result to a list of question objects
            //charge those choices
            return $AllQuestions;
        }


        public function getPersonId($nom,$email)
        {

            $this->dbConnect->connectDB();
            $Person =$this->dbConnect->executeSQL("SELECT * FROM jc_Personne Where nom = '$nom' and email = '$email'");
            $this->dbConnect->closeConnection();
            return $Person;

        }




    }


