<?php

declare(strict_types = 1);

class ArticleController extends Database
{
    public function index()
    {
        // Load all required data
        $articles = $this->getArticles();

        // Load the view
        require 'View/articles/index.php';
    }

    private function getArticles(){
    
        // TODO: fetch all articles as $rawArticles (as a simple array)
        $connect = $this->getConnection();
        $datas = [];

        try {

        $query = $connect->prepare("SELECT id, title, description, publish_date FROM article");
        $query->execute();
        $datas = $query->fetchAll();
        } catch (Exception $e) {
        die("Something went wrong with the query");
        }

        $rawArticles = [];

        foreach ($datas as $data) {
            $rawArticles[] = [
                'id' => $data['id'],
                'title' => $data['title'],
                'description' => $data['description'],
                'publish_date' => $data['publish_date']
            ];
        }

        foreach ($rawArticles as $rawArticle) {
            $id = (int) $rawArticle['id'];
            $articles[] = new Article($id, $rawArticle['title'], $rawArticle['description'], $rawArticle['publish_date']);
        }

        return $articles;
    }

    public function show(){
    
        // TODO: this can be used for a detail page

        // Load the view
        require 'View/articles/show.php';
    }
}