function confClose(e, active) {
	if (!active) {
		active = $("#beforeUnload").val();
	}
	if (active != 1) {
		e.returnValue = "DADOS NÃO SALVOS!\nClique em 'Permanecer Nesta Página' para continuar a edição deste registro ou em 'Sair Desta Página' para abandonar a edição. \n(OBS.: AO SAIR DA PÁGINA O REGISTRO NÃO SERÁ SALVO)";
		//dialog.find(".btn:default").focus();
	}
}

function calculateAge(dobString) {
	var dob = new Date(dobString);
	var currentDate = new Date();
	var currentYear = currentDate.getFullYear();
	var birthdayThisYear = new Date(currentYear, dob.getMonth(), dob.getDate());
	var age = currentYear - dob.getFullYear();

	if (birthdayThisYear > currentDate) {
		age--;
	}
	return age;
}

function myIP() {
	$.ajax({
		url: "http://api.hostip.info/get_html.php",
		type: "get",
		success: function(response) {
			var hostipInfo = response.split("\n");
			for (var i = 0; hostipInfo.length >= i; i++) {
				var ipAddress = hostipInfo[i].split(":");
				if (ipAddress[0] == "IP") return ipAddress[1];
			}
			// console.log(response);
		}
	});
}

$('document').ready(function() {

	txt = myIP();
	document.getElementById("ipModem").value = txt;

	$("#obj14").blur(function() {
		val = $(this).val();
		dob = calculateAge(val);
		if (val != 0) {
			//para não mostrar "NaN anos"
			$("#obj14-1").val(dob + " anos");
		}
	});
	$('#obj14').trigger('blur');

	$("#obj50").blur(function() {
		val = $(this).val();
		dob = calculateAge(val);
		if (val != 0) {
			//para não mostrar "NaN anos"
			$("#obj14-2").val(dob + " anos");
		}
	});
	$('#obj50').trigger('blur');

	$("#obj107").blur(function() {
		val = $(this).val();
		dob = calculateAge(val);
		if (val != 0) {
			//para não mostrar "NaN anos"
			$("#obj108").val(dob + " anos");
		}
	});
	$('#obj107').trigger('blur');

	jQuery('body').on('keydown', 'input, select, textarea', function(e) {
		var self = $(this),
		form = self.parents('form:eq(0)'),
		focusable, next;
		if (e.keyCode == 13 || e.keyCode == 39) {
			focusable = form.find('input, button, textarea, a').filter(':visible').filter(function() {
				return $(this).attr('readonly') != 'readonly' || $(this).attr('readonly') == 'undefined';
			});
			next = focusable.eq(focusable.index(this) + 1);
			if (next.length) {
				next.focus();
			} else {
				form.submit();
			}
			return false;
		} else if (e.keyCode == 37) {
			focusable = form.find('input, select, button, textarea, a').filter(':visible').filter(function() {
				return $(this).attr('readonly') != 'readonly' || $(this).attr('readonly') == 'undefined';
			});
			next = focusable.eq(focusable.index(this) - 1);
			if (next.length) {
				next.focus();
			} else {
				form.submit();
			}
			return false;
		}
	});

	$("input[rel!='pesquise'], select, textarea").change(function() {
		$("#beforeUnload").val("0");
	});
	setTimeout('$("#beforeUnload").val("1");', 2000);

	$("#obj1, #obj4, #obj105, #obj106, #obj109, #motivoExclusao, #obj92, #obj8, #obj10, #obj12, #obj15, #obj16, #obj28, #obj29, #obj35, #obj44, #obj45, #obj39, #obj56, #obj56-1, #obj63, #obj66, #obj73, #obj88, #obj115, #obj92, #objt107, #obj103").keyup(function() {
		this.value = this.value.replace(/[àÀáÁâÂãÃäÄ]/g, 'a');
		this.value = this.value.replace(/[èÈéÉêÊëË]/g, 'e');
		this.value = this.value.replace(/[ìÌíÍîÎïÏ]/g, 'i');
		this.value = this.value.replace(/[òÒóÓôÔõÕöÖ]/g, 'o');
		this.value = this.value.replace(/[ùÙúÚûÛüÜ]/g, 'u');
		this.value = this.value.replace(/[çÇ]/g, 'c');
		this.value = this.value.replace(/[`´^~¨]/g, '');
	});

	$('ul.nav li.dropdown').hover(function() {
		if (!$(".dropdown-menu:visible").size()) {
			$(this).closest('.dropdown-menu').show();
			$(this).addClass('open');
		}
	},
	function() {
		if (!$(".navbar-search input:focus").size()) {
			$(this).closest('.dropdown-menu').hide();
			$(this).removeClass('open');
		}
	});

	$('#obj20, #obj21, #obj38, #obj20-1').mask('(00)0000-0000');
	$('#obj101').mask('0000');
	$('#obj23').mask('00000-000');
	$('#obj7, #obj9, #obj110, #obj6-1, #objt5').mask('000.000.000-00', {
		reverse: true
	});
	$("#obj41, #obj42, #obj58, #obj67, #obj70, #obj111, #vlrRenda, #renda").mask("#.##0,00", {
		reverse: true,
		maxlength: false
	});
	$("#1, #obj2, #obj99").mask("##########0");
	$('#obj81-1, #obj81-2, #obj89-1, #obj89-2, #obj46-1, #obj46-2').mask('00');
	$('#2').mask('000000.0000.0000');

	if ($('#invalid').size() == 0 && $('#edit').size() == 0) {
		data = new Date();
		dia = data.getDate();
		if (dia < 10)
			dia = "0" + dia;
		mes = data.getMonth();
		meses = new Array(12);
		meses[0] = "01";
		meses[1] = "02";
		meses[2] = "03";
		meses[3] = "04";
		meses[4] = "05";
		meses[5] = "06";
		meses[6] = "07";
		meses[7] = "08";
		meses[8] = "09";
		meses[9] = "10";
		meses[10] = "11";
		meses[11] = "12";
		ano = data.getFullYear();
		today = (ano) + "-" + (meses[mes]) + "-" + (dia);

		$('#obj94, #obj102, #obj102-1, #dtAtivacao, #dtDesativacao, #dataAtual').val(today);
		if ($("input[name='edit']").size() == 0) {
			$("#obj102-1").val(today);
			$("#dataln").val(today);
			$("#obj104-0").val(today);

			$("#objt105-1").click(function() {
				$("#objt106").val(today);
			});
		}
		$("#objt105-2").click(function() {
			$("#objt106").val('');
		});
	}

	var data = new Date();
	var hora = data.getHours(); // 0-23
	var min = data.getMinutes(); // 0-59
	var seg = data.getSeconds(); // 0-59
	var str_hora = hora + ':' + min + ':' + seg;
	$('#obj102-2, #timeUltimaAtualizacao, #start').val(str_hora);

	$("input[rel!='pesquise'], select, textarea").change(function() {
		$("#beforeUnload").val("0");
	});
	setTimeout('$("#beforeUnload").val("1");', 2000);

	//$('#obj1').tooltip('hide');
	$('input[data-type="tooltip"]').mouseover(function() {
		val = $(this).val();
		$(this).attr('title', val);
		if (val.length > 12) {
			//$('input[data-type="tooltip"]').tooltip('hide');
		}
	});

	$('#obj59-1, #3-1, #3-2, #obj59-2, #obj61-1, #obj61-2, #obj62, #obj65, #obj96-1, #obj96-2, #obj97-1, #obj97-2, #obj72, #obj87, #obj90, #obj98-1, #obj98-2, #obj100-1, #obj100-2, #obj114-1, #obj114-2, #obj470-1, #obj470-2, #objt105-1, #objt105-2').bind("click change", function() {
		val = $(this).val();
		rel = $(this).attr("rel");
		rel = rel.split("|");
		id = $(this).attr("id");
		for (var i = 0; i < rel.length; i++) {
			disabledEnabled(rel[i], id);
		}
	});

	$("#ln-parent").hide();
	$("#contemplado-parent").hide();
	$("#conjuge-parent").hide();
	$("#assistencia-parent").hide();

	$("#obj97-1:checked").trigger("click");
	$("#objt105-1:checked").trigger("click");
	$("#obj96-1:checked").trigger("click");
	$("#objt105-2:checked").trigger("click");

	function disabledEnabled(rel, id) {
		rel = rel.split("-");
		option = rel[0];
		target = rel[1];
		if (val == option) {
			$('#' + target + "*").attr("readonly", false).attr("disabled", false);
			if (id == "objt105-1") {
				$('#assistencia-parent').show();
			} else if (id == "obj97-1") {
				$('#contemplado-parent').show();
			} else if (id == "obj96-1") {
				$('#ln-parent').show();
			}
			if (target == "objt88" && (val != 0 && val != 1)) {
				$('#' + target + "*").attr("readonly", true).attr("disabled", true);
			}
		} else {
			$('#' + target + "*").attr("readonly", true).attr("disabled", true);
			if (id == "objt105-2") {
				$('#assistencia-parent').hide();
			} else if (id == "obj97-2") {
				$('#contemplado-parent').hide();
			} else if (id == "obj96-2") {
				$('#ln-parent').hide();
			}
			if (target == "obj88" && (val != 0 && val != 1))
				$('#' + target + "*").attr("readonly", false).attr("disabled", false);
		}
		$('#' + target + '').trigger("chosen:updated");
		//$('#obj114-1, #obj114-2').trigger("click");
	}

	/*$("#excluir").click(function(){
		if($(this).is(':checked'))
			$("#divMotivoExclusao").show();
		else
			$("#divMotivoExclusao").hide();
	});

	$("#motivoExclusao").keyup(function(){
		val = $(this).val();
		if (val.length > 0)
			$("#btnExcluir").attr("disabled", false);
		else
			$("#btnExcluir").attr("disabled", true);
	});*/

$("#obj69").change(function() {
	val = $(this).val();
	vazio = '';
	if (val != 2)
		$("#obj70").val(vazio);
});

$("#obj33").change(function() {
	val = $(this).val();
	vazio = '';
	if (val == 0 || val == 1 || val == 3 || val == 4 || val == 5)
		$("#obj34").val(vazio);
});
$("#obj33").trigger('change');

$("#5").keyup(function() {
	if (val.length > 0)
		$("#6").attr("readonly", false);
	else
		$("#6").attr("readonly", true);
});
$("#7").change(function() {
	val = $(this).val();
	if (val != 0 || val != null || data - option - array - index == 0) {
		$("#8").attr("readonly", false);
		$("#9").attr("readonly", false);
	} else {
		$("#8").attr("readonly", true);
		$("#9").attr("readonly", true);
	}
});
$("#obj44").keyup(function() {
	val = $(this).val();
	if (val.length < 1) {
		$("#obj45").attr("readonly", true);
		$("#obj38").attr("readonly", true);
		$("#obj39").attr("readonly", true);
		$("#obj46-1, #obj46-2").attr("readonly", true);
		$("#obj46-1, #obj46-2").attr("required", true);

	} else {
		$("#obj45").attr("readonly", false);
		$("#obj38").attr("readonly", false);
		$("#obj39").attr("readonly", false);
		$("#obj46-1, #obj46-2").attr("readonly", false);
		$("#obj46-1, #obj46-2").attr("required", false);
	}
});
$('#obj44').trigger('keyup');

$("#obj33").change(function() {
	val = $(this).val();
	if (val == 2 || val == 6 || val == 7) {
		$("#obj34").attr("readonly", false);
		$("#obj9").attr("readonly", false);
		$("#obj10").attr("readonly", false);
		$('#conjuge-parent').show();
	} else {
		$("#obj34").attr("readonly", true);
		$("#obj9").attr("readonly", true);
		$("#obj10").attr("readonly", true);
		$('#conjuge-parent').hide();

		$("#obj96-1, #obj96-2").change(function() {
			val = $(this).val();
			if (val == 1) {
				$("#obj34").attr("readonly", false);
				$("#obj9").attr("readonly", false);
				$("#obj10").attr("readonly", false);

			} else {
				$("#obj34").attr("readonly", true);
				$("#obj9").attr("readonly", true);
				$("#obj10").attr("readonly", true);
				$('#conjuge-parent').hide();
			}

		});
		$('#obj96-1, #obj96-2').trigger('change');
	}

});
$('#obj33').trigger('change');

$("#obj69").change(function() {
	val = $(this).val();
	if (val == 1) {
		$("#obj71-1, #obj71-2").attr("disabled", false);
		$("#obj70").attr("readonly", true);

	} else if (val == 2) {
		$("#obj70").attr("readonly", false);
		$("#obj71-1, #obj71-2").attr("disabled", true);
	} else {
		$("#obj71-1, #obj71-2").attr("disabled", true);
		$("#obj70").attr("readonly", true);
	}

});
$('#obj69').trigger('change');

$("#obj65").change(function() {
	val = $(this).val();
	if (val == 1 || val == 2 || val == 3) {
		$("#obj67").attr("readonly", false);
	} else {
		$("#obj67").attr("readonly", true);
	}

});
$('#obj65').trigger('change');

$("#obj62").change(function() {
	val = $(this).val();
	if (val == 4) {
		$("#obj63").attr("readonly", false);
	} else {
		$("#obj63").attr("readonly", true);
	}

});
$('#obj62').trigger('change');

$("#excluir").click(function() {
	if ($(this).isnot(':checked'))
		$("#divMotivoExclusao").hide();
	else
		$("#divMotivoExclusao").show();
});

$("#btnpesquisa").click(function() {
	$("#pesquisa-form").submit();
});

$("#pesquisa-form").submit(function() {
	endereco = $("#obj4").val();
	np = $("#obj5").val();
	if (endereco) {
		if (!np) {
			$("#erroPesq").html("Por favor preencha NP").show();
			return false;
		}
	} else if (np) {
		if (!endereco) {
			$("#erroPesq").html("Por favor preencha ENDEREÇO").show();
			return false;
		}
	} else {
		$("#erroPesq").hide();
	}
});

$("#abrirDivs").click(function() {
	$(".openAll").trigger("click");
});

$("#obj7, #obj9").blur(function() {
	cpf = $(this).val();
	hId = $('#obj104-2').val();
	$.ajax({
		url: "http://localhost/cadhabitacional/public/ajax/verificacpf",
		data: {
			'cpf': cpf,
			'hId': hId
		}
	}).done(function(nInscricao) {

		if (nInscricao) {
			elementos = $('#btnSalvar, #excluir, #btnCancelar, #btnExcluir, #titular-parent, #aspectos-parent, #condicao-parent, #caracteristicas-parent, #entrevista-parent');
			json = JSON.parse(nInscricao);
			erro = '';
			if (json.hId.length > 0) {
				erro += "Cpf já existe na inscrição de número: " + json.hId + " como TITULAR \n";
			}

			if (json.sId.length > 0) {
				erro += "Cpf já existe no CÔNJUGE, de inscrição número: " + json.sId + "\n";
			}

			if (json.dId.length > 0) {
				erro += "Cpf já existe na COMPOSIÇÃO FAMILIAR sob inscrição número: " + json.dId + "\n";
			}

			if ((json.hId.length > 0) || (json.sId.length > 0) || (json.dId.length > 0)) {
				dec = confirm(erro);
				if (dec) {
					elementos.hide();
					if (json.hId)
						$('#obj0').val(json.hId);
					else if (json.sId)
						$('#obj0').val(json.sId);
					else if (json.dId)
						$('#obj0').val(json.dId);
				}
			} else {
				elementos.show();
				alert(olá);
			}

			if (json.nrCadastro.length > 0) {
				erro = "Cpf existente no banco de dados do GEO, no controle de número: " + json.nrCadastro;
				dec = confirm(erro);
					//elementos.hide();
				}
			}
		});
});
$('#add-dep').click(function(event) {
	$('#modal-form').data('action', 'add');

	$('#dependentes-modal').modal('show');
});
$('#tbody-dependentes').on('click', '.edit-btn', function(event){
	event.preventDefault();
	var id = $(this).data('id');
	var name = $('input[name="dependent['+id+'][name]"]').val();
	var parentesco = $('input[name="dependent['+id+'][parentesco]"]').val();
	var datanasc = $('input[name="dependent['+id+'][datanasc]"]').val();
	var age = $('input[name="dependent['+id+'][age]"]').val();
	var escolaridade = $('input[name="dependent['+id+'][escolaridade]"]').val();
	var cpf = $('input[name="dependent['+id+'][cpf]"]').val();
	var renda = $('input[name="dependent['+id+'][renda]"]').val();
	var status = $('input[name="dependent['+id+'][status]"]').val();
	$.get('/cadhabit/partials/dependentes-form', {name: name, parentesco: parentesco, datanasc: datanasc, age: age, escolaridade: escolaridade, cpf: cpf, renda: renda, status: status}, function(data){
		$('#modal-form').html(data);
		$('#modal-form').data('action', 'edit');
		$('#modal-form').data('edit-id', id);
	}, 'html');
	$('#dependentes-modal').modal('show');
});
$('#modal-form').on('submit', '#dependentes-form', function(event){
	event.preventDefault();
	var line = '';
	var inputs = '';
	var count = $('#contagem').val();
	count = (count*1)+1;
	if($('#modal-form').data('action')== 'edit'){
		count = $('#modal-form').data('edit-id');
	}

	$.each($(this).serializeArray(), function(chave, valor) {
		var value = '';
		if(valor.name == 'status' ){
			if(valor.value == 1){
				value = 'Ativo';
			} else {
				value = 'Inativo';
			}
		} else {
			value = valor.value;
		}
		line += '<td>'+value+'</td>';
		dataType = '';
		if(valor.name == 'renda') dataType = 'data-type = "renda"';
		inputs += '<input type="hidden" name="dependent['+count+']['+valor.name+']" '+dataType+' value="'+valor.value+'">';
	});
	line += '<td> <a href="#" class="btn btn-default edit-btn" data-id="'+count+'">Editar</a></td>';
	if($('#modal-form').data('action')== 'edit'){
		$('#'+count+'-dependents').html(line+inputs);
		$('#obj111').val('');
		$("input[data-type = 'rendaTotal']").trigger('blur');
	} else {
		$('#contagem').val(count);
		$('#tbody-dependentes').prepend('<tr id="'+count+'-dependents">'+line+inputs+'</tr>');
	}
	$('#dependentes-modal').modal('hide');
	$('#dependentes-form :input[type="text"]').each(function(){
		$(this).val('');
	});
});

});

function postLista(val) {
	$("#listaNrIncricao").val(val);
	$("#listaNrIncricao").parent().submit();
	return false;
}