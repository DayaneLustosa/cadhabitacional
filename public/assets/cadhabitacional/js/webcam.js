$(function() {
	$("#btnFoto").click(function(){
		$('#webcam-modal').modal('show');
	});
});
$(document).ready(function() {
	$("#webcam").scriptcam({
		license: 'fe6840285f2cc0ff576aac2fe227b9d42',
		showMicrophoneErrors:false,
		onError:onError,
		cornerRadius:20,
		cornerColor:'e3e5e2',
		onWebcamReady:onWebcamReady,
		uploadImage:'../scriptcam/upload.gif',
		onPictureAsBase64:base64_tofield_and_image,

		noFlashFound: '<p><a href="http://www.adobe.com/go/getflashplayer">\Adobe Flash Player</a> 11.7 or greater is needed to use your webcam.</p>'
	});
});
function playasound() {
	$.scriptcam.playMP3("/scriptcam/bell.mp3");
}
function base64_tofield() {
	$('#textoFoto').val("data:image/png;base64,"+$.scriptcam.getFrameAsBase64());
}
function base64_toimage() {
	$('#image').attr("src","data:image/png;base64,"+$.scriptcam.getFrameAsBase64());
}
function base64_tofield_and_image(b64) {
	$('#textoFoto').val("data:image/png;base64,"+b64);
	$('#image').attr("src","data:image/png;base64,"+b64);
}
function changeCamera() {
	$.scriptcam.changeCamera($('#cameraNames').val());
}
function onError(errorId,errorMsg) {
	onError: oopsError;
}
function oopsError (errorId, errorMsg) {
	alert (errorMsg);
}
function onWebcamReady(cameraNames,camera) {
	$.each(cameraNames, function(index, text) {
		$('#cameraNames').append($('<option></option>').val(index).html(text))
	});
	$('#cameraNames').val(camera);
}