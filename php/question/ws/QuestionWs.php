<?php

	require_once('../dao/QuestionDao.php');

	$questionDao = new QuestionDao;

	return json_encode($questionDao->getAllQuestions());


?>
