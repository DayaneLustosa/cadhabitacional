<?php
	/**
	*
	*/
	class Controllers_CadastroUsuario
	{

		function indexAction()
		{
			$form = new Forms_Usuarios("");
			$form-> setAction(BASE_URL . 'cadastrousuario/salvar');
			$view = array(
				'form' => $form
				);
			return $view;
		}
		function salvarAction()
		{
			$data = $_POST; //editar cria getid
			$formatFields = new Library_Form_FormatFields();
			$data['cpf'] = $formatFields->mask($data['cpf']);
			$users = new Models_Users();
			$populate = $users-> populate($data);
			$result = $users->save($populate);
			$flashMessages = new Library_FlashMessages();

			if ($result) {
				$flashMessages->setMessage('success', 'Cadastro efetuado com sucesso');
			} else {
				$flashMessages->setMessage('danger', 'Houve um erro ao efetuar cadastro: ' . $result);
			}

			$view = array(
				'result' => $result
				);
			return $view;
		}
	}
	?>