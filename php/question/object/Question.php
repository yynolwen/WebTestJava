<?php
require_once('../object/Choice.php');

class Question {
    public $id;
    public $subject;
    public $answer;
    public $choices = array();

    function __construct() {

    }

    /**
     * @param array $choices
     */
    public function setChoices($choices)
    {
        $this->choices = $choices;
    }

    /**
     * @param mixed $answer
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;
    }

    /**
     * @param mixed $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getAnswer()
    {
        return $this->answer;
    }
}

?>
