<?php

namespace CourseControl\controller;

require_once './../include/init.inc.php';

class HomeController
{
    public function showHomepage()
    {
        global $twig;
        
        return $twig->render('home.view.php', [
            'title' => 'Home'
        ]);
    }
}
