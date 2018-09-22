<?php
/**
 * Created by PhpStorm.
 * User: parus
 * Date: 22.09.2018
 * Time: 20:29
 */
class Model_Blog extends Db
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getBlog() {
        $sql = $this->connection->prepare("SELECT * FROM blog");
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function setBlog($text, $author, $email) {
        $sql = $this->connection->prepare("INSERT INTO `blog`(`text`, `author`, `email`, 
                                  ) VALUES (:text, :author, :email)");
        $sql->bindParam(':text', $text, PDO::PARAM_STR);
        $sql->bindParam(':author', $author, PDO::PARAM_STR);
        $sql->bindParam(':email', $email, PDO::PARAM_STR);

        $sql->execute();

    }

    public function getBlogById($id) {
        //var_dump($id);die;
        $sql = $this->connection->prepare("SELECT * FROM blog WHERE id = :id");
        $sql->bindParam(':id',$id, PDO::PARAM_INT);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function setView($id) {
        $sql = $this->connection->prepare("UPDATE blog SET `comment_number` = (`comment_number` + 1) WHERE id = :id");
        $sql->bindParam(':id',$id, PDO::PARAM_INT);
        $sql->execute();



    }




}