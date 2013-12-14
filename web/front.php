<?php

require_once __DIR__.'/../src/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing;
use Symfony\Component\HttpKernel;
use WebBundle\Bundle\Simplex\Framework;


$request = Request::createFromGlobals();
$routes = include __DIR__.'/../src/app.php';
    
$context =  new Routing\RequestContext();
$context->fromRequest($request);

$matcher = new Routing\Matcher\UrlMatcher($routes, $context);

$resolver = new HttpKernel\Controller\ControllerResolver();

$framework = new Framework($matcher, $resolver);
$response = $framework->handle($request);

$response->send();