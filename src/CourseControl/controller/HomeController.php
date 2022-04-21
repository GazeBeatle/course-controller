<?php

namespace CourseControl\Controller;

require_once './../include/init.inc.php';

class HomeController
{
    public function showHomepage()
    {
        global $twig;
        
        return $twig->render('index.view.php', [
            'title' => 'Home'
        ]);
    }
}
