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

    private function getArticles()
    {
        require 'connect.php';
        // TODO: fetch all articles as $rawArticles (as a simple array)

        $query = "SELECT id, title, description, publish_date FROM articles";
        $stmt = $db->executeQuery($query);
        $rawArticles = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $articles = [];

        foreach ($rawArticles as $rawArticle) {
            $id = (int) $rawArticle['id'];
            $articles[] = new Article($id, $rawArticle['title'], $rawArticle['description'], $rawArticle['publish_date']);
        }

        return $articles;
    }

    public function show()
    {
        // TODO: this can be used for a detail page
    }
}