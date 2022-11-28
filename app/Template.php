<?php

namespace App;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Template
{
    private string $template;
    private array $context;

    public function __construct(string $template, array $context = [])
    {
        $this->template = $template;
        $this->context = $context;
    }

    public function render(): string
    {
        $loader = new FilesystemLoader('public/views');
        $twig = new Environment($loader);
        return $twig->render($this->template, $this->context);
    }
}