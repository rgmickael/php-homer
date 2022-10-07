<?php

declare(strict_types=1);

namespace Handlers;

class Login extends Handler
{
	public function handle():string
	{
		if(isset($_SESSION['username']))
		{
			$this->requestRedirect('/');
			return '';
		}
		$username='admin';
		$passwordHash='$2y$10$vDgK3T/RSg2jlxQzl5eki.SPNe3cugaeiviansyaQiuPm6meFFYqW';

		$formError=[];

		if($_SERVER['REQUEST_METHOD'] === 'POST')
		{
			$formUsername=$_POST['username'] ?? '';
			$formPassword=$_POST['password'] ?? '';

			if($formUsername !== $username)
			{
				$formError=['username'=>sprintf('The username [%s] was not found', $formUsername)];
			}
			elseif(!password_verify($formPassword, $passwordHash))
			{
				$formError=['password'=>'The provied password is invalid'];
			}else{
				$_SESSION['username']=$username;
				$_SESSION['loginTime']=date(\DATE_COOKIE);
				$this->requestRedirect('/profile');
				return '';
			}
		}
		return (new \Components\Template('login-form'))->render(
			[
				'formError'=>$formError,
				'formUsername'=>$formUsername ?? ''
			]);
	}

	public function getTitle():string
	{
		return 'Login - '.parent::getTitle();
	}
}