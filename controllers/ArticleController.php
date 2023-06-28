<?php

declare(strict_types = 1);

class ArticleController
{
    public function index()
    {
        // Load all required data
        $articles = $this->getArticles();

        // Load the view
        require '../view/articles/index.php';
    }

    // Note: this function can also be used in a repository - the choice is yours
    private function getArticles()
    {
        // TODO: prepare the database connection
        $dbHost = 'localhost';
        $dbName = 'becode';
        $dbUser = 'root';
        $dbPwd = '';

        $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPwd);
        
        $stmt = $pdo->query('SELECT id, title, description, publish_date FROM article');
        $rawArticles = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // TODO: fetch all articles as $rawArticles (as a simple array)

        $articles = [];
        foreach ($rawArticles as $rawArticle) {
            $id = (int) $rawArticle['id'];
            $articles[] = new Article($rawArticle['title'], $rawArticle['description'], $rawArticle['publish_date']);
        }

        return $articles;
    }

    public function show()
    {
        // TODO: this can be used for a detail page
    }
}