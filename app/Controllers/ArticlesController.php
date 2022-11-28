<?php

namespace App\Controllers;

use App\Services\IndexArticleService;
use App\Template;

class ArticlesController
{
    public function index(): Template
    {
        $news = $_GET['news'] ?? 'World';
        $category = $_GET['category'] ?? null;
        $articles = (new IndexArticleService())->execute($news, $category);
        return new Template('index.twig', ['articles' => $articles]);
    }
}