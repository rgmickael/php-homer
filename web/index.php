<?php

require_once __DIR__.'/../src/components/Template.php';

$main=new \Components\Template('main');

$data=[
	'title'=>'.: Homer',
];


echo $main->render($data);