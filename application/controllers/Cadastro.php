<?php
class Controllers_Cadastro
{
	function indexAction()
	{
		$form = new Forms_Requerentes("");
		$form-> setAction(BASE_URL . 'cadastro/salvar');

		$dependentsForm = new Forms_Dependents('dependents');
		$view = array(
			'form' => $form,
			'dependentsForm' => $dependentsForm
			);
		return $view;
	}
	function salvarAction()
	{
			$data = $_POST; //editar cria getid
			$formatFields = new Library_Form_FormatFields();
			$data['cpf'] = $formatFields->mask($data['cpf']);

			$holderdata = new Models_Holderdata();
			$holderdataColumns = $holderdata->getColumns();
			$holderdataData = [];

			foreach($holderdataColumns as $columns) {
				$holderdataData[$columns] = $data['holderdata'][$columns];
			}

			$holderdataPopulate = $holderdata->populate($holderdataData);
			$holderdataResult = $holderdata->save($holderdataPopulate);

			$origin = new Models_Origin();
			$this->modelPopulateSave($origin, $data['origin'], $holderdataResult);

			$spousedata = new Models_Spousedata();
			$this->modelPopulateSave($spousedata, $data['spousedata'], $holderdataResult);

			$socialaspects = new Models_Socialaspects();
			$this->modelPopulateSave($socialaspects, $data['socialaspects'], $holderdataResult);

			$homecarac = new Models_Homecarac();
			$this->modelPopulateSave($homecarac, $data['homecarac'], $holderdataResult);

			$blacklist = new Models_Blacklist();
			$this->modelPopulateSave($blacklist, $data['blacklist'], $holderdataResult);

			$contemplated = new Models_Contemplated();
			$this->modelPopulateSave($contemplated, $data['contemplated'], $holderdataResult);

			$dependents = new Models_Dependents();
			foreach ($data['dependent'] as $value) {
				$this->modelPopulateSave($dependents, $value, $holderdataResult);
			}

			$principaldata = new Models_Principaldata();
			$this->modelPopulateSave($principaldata, $data['principaldata'], $holderdataResult);

			$flashMessages = new Library_FlashMessages();

			if ($holderdataResult) {
				$flashMessages->setMessage('success', 'Cadastro efetuado com sucesso');
			} else {
				$flashMessages->setMessage('danger', 'Houve um erro ao efetuar cadastro: ' . $holderdataResult);
			}

			$view = array(
				'holderdataResult' => $holderdataResult
				);
			return $view;
		}

		private function modelPopulateSave($model, $data, $holderdataResult, $holderdata_id = 'holderdata_id') {
			$modelColumns = $model->getColumns();
			$modelData = [];
			foreach($modelColumns as $columns) {
				$modelData[$columns] = $data[$columns];
			}
			$modelData[$holderdata_id] = $holderdataResult;
			$modelPopulate = $model->populate($modelData);
			$modelResult = $model->save($modelPopulate);
		}
	}
	?>