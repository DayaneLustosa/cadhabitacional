<?php
	/**
	*
	*/
	class Controllers_Index
	{

		public function indexAction(){
			$form = new Forms_Login("Login");
			//$form->setAction('sobrepõe');
			$view = array(
				'form' => $form
				);
			return $view;
		}

		public function loginAction(){
			$email=$_POST['email'];
			$senha=$_POST['senha'];

			$users= new Models_Users();
			$login= $users->verifyLogin($email, $senha);
			try {
				if(!$login)	{
					throw new Exception("Usuário e/ou senha inválido");
				} else {
					$_SESSION['user'] = [
					'id' => $login['id'],
					'name' => $login['name'],
					'apelido' => $login['apelido'],
					'atribuicao' => $login['atribuicao']
					];
					header('Location: ' . BASE_URL . 'cadastro');
				}
			} catch (Exception $e) {
				session_destroy();
				return new Library_Error($e);
			}
		}
		public function logoutAction(){
			session_destroy();
			header('Location: ' . BASE_URL);
		}
	}
	?>