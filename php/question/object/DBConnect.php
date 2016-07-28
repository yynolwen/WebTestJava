<?php

/**
 * Created by PhpStorm.
 * User: YongYanOspiea
 * Date: 19/07/2016
 * Time: 10:51
 */
class DBConnect
{
    private $username = "ospieafrpffqin";
    private $password = "Ospieadm1n";

    private $db;

    function __construct( ) {

    }
    function connectDB()
    {
        $this->db = new PDO("mysql:host=ospieafrpffqin.mysql.db;dbname=ospieafrpffqin", $this->username, $this->password);
        #$this->db = new PDO("mysql:host=localhost;dbname=TestJava", "root", "root");

    }

    function closeConnection(){
        $this->db = null;
    }


    function executeSQL($sql)
    {
        return $this->db->query($sql);
    }

    function prepareAndExecuteSQL($sql, $data)
    {
        #$db = $this->connectDB($this->getUsername(),$this->getUsername());
        $result = $this->db->prepare($sql);
        $result->execute($data);
        return $result;
    }

    function __toString()
    {
        return "";
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}

