<?php
/**
 * Created by PhpStorm.
 * User: parus
 * Date: 19.09.2018
 * Time: 12:12
 */
class Model_Categories extends Db
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getCategories() {
        $sql = $this->connection->prepare("SELECT * FROM category");
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}