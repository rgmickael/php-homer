<?php

require_once __DIR__.'/../src/components/Template.php';
require_once __DIR__.'/../src/components/Router.php';
require_once __DIR__.'/../src/handlers/Handler.php';
require_once __DIR__.'/../src/handlers/Login.php';
require_once __DIR__.'/../src/handlers/Logout.php';
require_once __DIR__.'/../src/handlers/Profile.php';

session_start();

$main=new \Components\Template('main');

$data=[
	'title'=>'.: Homer',
	// 'content'=>(string) '<pre>'.print_r($_SERVER, true).'</pre>',
];

$router=new \Components\Router();

if($handler=$router->getHandler())
{
    $content=$handler->handle();

// 	if($handler->willRedirect()){
// 		return;
// 	}

    $data['content']=$content;
    $data['title']=$handler->getTitle();
}

echo $main->render($data);