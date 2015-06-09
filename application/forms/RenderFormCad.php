<?php
class Forms_RenderFormCad {
	public function render($form){
		$html = $form->openTag();
		$i = 0; foreach ($form->getFieldsets() as $fieldset):

		$html .= '<div class="panel panel-default" id="'. $fieldset->getName() .'-parent">

		<div class="panel-heading">
		<h4 class="panel-title">
		<a data-toggle="collapse" data-parent="#accordion" href="#'.$fieldset->getName ().'" class="openAll">
		<span class="caret"></span>
		'. $fieldset->getTitle() .'
		</a>
		</h4>
		</div>

		<div id="'. $fieldset->getName() .'"
		class="panel-collapse collapse">
		<div class="panel-body">';
		$html .= $fieldset->renderElements(['prepend_html' => '<div class="col-md-3 col-sm-6 col-xs-12 col-lg-3" style="height: 94px">', 'append_html' => '</div>']);
		$html .=
		'</div>
		</div>
		</div>';
		$i++; endforeach;
		$html .= $form->renderElements();

		$html .= '<hr />
		<div class="row btn-group col-md-12 col-sm-12 col-xs-12 col-lg-12">
		<div class="col-md-2 col-sm-2 col-xs-2 col-lg-2">
		<input type="checkbox" id="excluir">
		<button class="btn btn-danger" type="button" disabled="disabled" id="btnExcluir">Excluir</button>
		</div>
		<div id="divMotivoExclusao" style="display: none;" class="col-md-2 col-sm-2 col-xs-2 col-lg-2  has-success">
		<Textarea name="motivoExc" class="form-control" placeholder="Motivo da Exclusão..." autofocus="autofocus"
		id="motivoExclusao"></Textarea>
		</div>
		<div align="right" class="col-md-7 col-sm-7 col-xs-7 col-lg-7">
		<button class="btn btn-success" type="submit">Salvar</button>
		<a href="../identificacao/identificacao">
		<button	class="btn btn-default" type="button">Imprimir</button>
		</a>
		<button class="btn btn-default" type="button">Cancelar</button>
		</div>
		</div>
		</div>
		'. $form->closeTag();
		return $html;
	}
}