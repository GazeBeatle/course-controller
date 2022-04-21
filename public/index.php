<?php

require_once './../include/init.inc.php';

use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing;
use Symfony\Component\HttpKernel;

$request = Request::createFromGlobals();
$requestStack = new RequestStack();
$routes = include './../include/routing.inc.php';

$context = new Routing\RequestContext();
$matcher = new Routing\Matcher\UrlMatcher($routes, $context);

$controllerResolver = new HttpKernel\Controller\ControllerResolver();
$argumentResolver = new HttpKernel\Controller\ArgumentResolver();

$dispatcher = new EventDispatcher();

$dispatcher->addSubscriber(new HttpKernel\EventListener\RouterListener($matcher, $requestStack));
$errorListener = new HttpKernel\EventListener\ErrorListener(
    'CourseControl\Controller\ErrorController::exception'
);
$dispatcher->addSubscriber($errorListener);
$dispatcher->addSubscriber(new HttpKernel\EventListener\ResponseListener('UTF-8'));
$dispatcher->addSubscriber(new Framework\StringResponseListener());

$framework = new Framework\Framework($dispatcher, $controllerResolver, $requestStack, $argumentResolver);

$response = $framework->handle($request);
$response->send();
