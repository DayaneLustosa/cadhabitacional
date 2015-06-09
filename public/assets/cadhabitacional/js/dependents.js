$('document').ready(function(){
$("#obj105, #obj106, #obj109").keyup(function(){
		this.value = this.value.replace(/[àÀáÁâÂãÃäÄ]/g,'a');
		this.value = this.value.replace(/[èÈéÉêÊëË]/g,'e');
		this.value = this.value.replace(/[ìÌíÍîÎïÏ]/g,'i');
		this.value = this.value.replace(/[òÒóÓôÔõÕöÖ]/g,'o');
		this.value = this.value.replace(/[ùÙúÚûÛüÜ]/g,'u');
		this.value = this.value.replace(/[çÇ]/g,'c');
		this.value = this.value.replace(/[`´^~¨]/g,'');
});
	
$('#obj7, #obj9, #obj110, #obj6-1, #objt5').mask('000.000.000-00', {reverse: true});
$("#obj41, #obj42, #obj58, #obj67, #obj70, #obj111, #salario, #vlrRenda").mask("#.##0,00", {reverse: true, maxlength: false});
function calculateAge(dobString) {
    var dob = new Date(dobString);
    var currentDate = new Date();
    var currentYear = currentDate.getFullYear();
    var birthdayThisYear = new Date(currentYear, dob.getMonth(), dob.getDate());
    var age = currentYear - dob.getFullYear();

    if(birthdayThisYear > currentDate) {
        age--;
    }
    return age;
}

$("#obj107").blur(function(){
	val = $(this).val();
	dob = calculateAge(val);
	$("#obj108").val(dob + " anos");
});
});