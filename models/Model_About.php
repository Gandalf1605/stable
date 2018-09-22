<?php
/**
 * Created by PhpStorm.
 * User: parus
 * Date: 19.09.2018
 * Time: 18:21
 */

class Model_About extends Db
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getOffers() {
        $sql = $this->connection->prepare("SELECT * FROM offers");
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getEmployees () {
        $sql = $this->connection->prepare("SELECT * FROM employees LIMIT 6");
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }


}