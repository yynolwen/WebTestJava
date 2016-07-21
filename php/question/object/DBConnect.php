<?php

/**
 * Created by PhpStorm.
 * User: YongYanOspiea
 * Date: 19/07/2016
 * Time: 10:51
 */
class DBConnect
{
    public $username = "root"; #= "ospieafrpffqin";
    public $password = "root"; #= "Ospieadm1n";

    function __construct( $username, $password ) {
        $this->$username = $username;
        $this->$password = $password;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    function connectDB($username, $password)
    {
        #$db = new PDO("mysql:host=ospieafrpffqin.mysql.db;dbname=ospieafrpffqin", $username, $password);
        $db = new PDO("mysql:host=localhost;dbname=TestJava", $username, $password);
        return $db;

    }

    function executeSQL(PDO $db,$sql)
    {
        #$db = $this->connectDB($this->getUsername(),$this->getUsername());

        $result = $db->query($sql);
        return $result;
    }

    function prepareSQL(PDO $db,$sql,$data)
    {
        #$db = $this->connectDB($this->getUsername(),$this->getUsername());
        $result = $db->prepare($sql);
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

?>