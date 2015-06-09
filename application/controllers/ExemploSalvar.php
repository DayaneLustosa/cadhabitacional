<?php

[...]

function salvarAction() {
 $data = $_POST; // pega dados recebidos (no seu sistema isso pode já estar em uma função)
 
 $modelHolderdata = new Models_Holderdata(); // instacia os modelos 
 $modelOrigin = new Models_Origin(); // instacia os modelos
 $modelSpousedata = new Models_Spousedata();
 
 $obj = (object) array(); // à confirmar essa linha, pode conter erros
 $obj->name = $_POST['name']; // define os valores do objeto 
 $obj->otherField = $_POST['otherField']; // define os valores do objeto
 $id = $modelHolderdata->_insert($obj); // perceba que retornará um id (talvez tenha que implementar)
 
 $obj = (object) array(); // à confirmar essa linha, pode conter erros
 $obj->holderdata_id = $id; // pega o $id do holder data para inserir no origin
 $modelOrigin->_insert($obj); // insere no origin
 $modelSpousedata->setHolderData_id($id);
 $modelSpousedata->_insert($data);
 $data = $modelSpousedata->setHolderData_id($id);

}

[...]

?>