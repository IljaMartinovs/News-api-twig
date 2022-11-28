<?php

namespace App\Services;

use App\ArticleCollection;
use App\Models\Article;
use jcobhams\NewsApi\NewsApi;

class IndexArticleService
{
    public function execute(string $news, ?string $category = null): ArticleCollection
    {
        $articlesApiResponse = $this->getArticles($news, $category);
        $articles = new ArticleCollection();

        foreach ($articlesApiResponse->articles as $article) {
            $articles->addArticles(new Article(
                $article->title,
                $article->url,
                $article->description,
                $article->publishedAt,
                $article->urlToImage));
        }
        return $articles;
    }

    private function getArticles(string $news, ?string $category = null)
    {
        $newsApi = new NewsApi($_ENV['API_KEY']);
        if (!$category)
            return $newsApi->getEverything($news, null, null, null, null, null, "en", null, 18);
        return $newsApi->getTopHeadLines($category);
    }
}