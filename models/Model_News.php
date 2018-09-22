<?php
/**
 * Created by PhpStorm.
 * User: parus
 * Date: 19.09.2018
 * Time: 12:00
 */
class Model_News extends Db {

    public function __construct() {
        parent::__construct();
    }


    public function getNewsList() {
        $result = $this->connection->query("SELECT * FROM news ORDER BY news_date DESC LIMIT 10");

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getLastNews($count = 3) {
        $sql = $this->connection->prepare("SELECT * FROM news ORDER BY news_date LIMIT :count");
        $sql->bindParam(':count', $count, PDO::PARAM_INT);
        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getTopNews() {
        $sql = $this->connection->prepare("SELECT * FROM news LEFT JOIN category ON news.news_cat_id = category.cat_id WHERE news_day = 1 ORDER BY news_date LIMIT 4");
        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCategoryNews($category) {
        $sql = $this->connection->prepare("SELECT * FROM news INNER JOIN category ON news.news_cat_id = category.cat_id WHERE cat_code = :category");
        $sql->bindParam(':category', $category, PDO::PARAM_STR);
        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getNewsById($newsId) {
        $sql = $this->connection->prepare("SELECT * FROM news WHERE news_id = :newsId");
        $sql->bindParam(':newsId', $newsId, PDO::PARAM_INT);
        $sql->execute();

        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function setNewsViews($newsId) {
        $sql = $this->connection->prepare("UPDATE news SET news_views = (news_views + 1) WHERE news_id = :newsId");
        $sql->bindParam(':newsId', $newsId, PDO::PARAM_INT);
        $sql->execute();
    }

    public function getNewsComments() {
        $sql = $this->connection->prepare("SELECT * FROM comments WHERE top_comment = 1 ORDER BY comment_date DESC LIMIT 5");
        //$sql->bindParam(':newsId', $newsId, PDO::PARAM_INT);
        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

}