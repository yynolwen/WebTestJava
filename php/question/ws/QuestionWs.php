<?php

	require_once('../dao/QuestionDao.php');

	$questionDao = new QuestionDao;

	echo json_encode(array("questions" => $questionDao->getAllQuestions()));


?>
