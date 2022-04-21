<?php

use Symfony\Component\HttpFoundation\Request;

function render_view(Request $request)
{
    extract($request->attributes->all(), EXTR_SKIP);
    ob_start();
    include sprintf('./../src/view/%s.view.php', $_route);

    return ob_get_clean();
}

function e($html)
{
    return htmlspecialchars($html);
}
