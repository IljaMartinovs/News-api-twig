<?php

namespace App;

use App\Models\Article;

class ArticleCollection
{
    public array $articles = [];

    public function addArticles(Article ...$articles)
    {
        $this->articles = array_merge($this->articles, $articles);
    }
}