var PL_FILE_PATH = HTTP_SERVER + '/wristbandnew/img/cliparts/uploads/';
var PL_REMOVE_FILE = HTTP_SERVER + 'uploads/userCliparts/remove.php';
var PL_UPLOADER = UPLOAD_URL;
var PL_FLASH_SWF_URL = HTTP_SERVER + 'wristband/js/jquery/fileupload/Moxie.swf';
var PL_SILVERLIGHT_XAP_URL = HTTP_SERVER + 'wristband/js/jquery/fileupload/Moxie.xap';
var PL_RUNTIMES = 'html5,flash,silverlight,html4';
var PL_MAX_SIZE = '4mb';
var PL_ALLOWED_FILES = "jpeg,jpg,gif,png,eps,pdf,psd,ai,bmp,tif,tiff";
var PL_FILES_TITLE = "Clipart files";

var userClipart = [];

$('.uploadedFile span').on('click',function(){
	var btn = $(this);
	var curfile = btn.attr('ref');
	var file_name = userClipart[curfile].target_name;
	
	$.ajax({
		url: PL_REMOVE_FILE,
		type:'post',
		async : false,
		data: {
			file_name: file_name
		},
		success:function(){
			title = btn.parent('.uploadedFile').parent('div').parent('li').find('.drpMenuItems').attr('title');
			btn.parent('.uploadedFile').hide();
			if(title == 'Upload Clipart'){
			btn.parent('.uploadedFile').parent('div').parent('li').find('.uploadClipart').show();
			}
			userClipart[curfile] = [];
			btn.removeAttr('ref');
			uploaderFS.refresh();
			uploaderFE.refresh();
			uploaderBS.refresh();
			uploaderBE.refresh();
			
		}
	});
});


function uploadingEvent(id,file){
	$('#'+id+'Loading span').css('width',file.percent+'%');
}
function uploadInitEvent(id){
	$('#'+id+'Loading').show();
	$('#'+id+'file').hide();
}
function uploadCompleteEvent(index,id,filename){
	userClipart[index] = filename;
	$('#'+id+'Loading span').css('width','100%');
	$('#'+id+'Loading').hide();
	$('#'+id+'UploadedFile').show();
	$('#'+id+'UploadedFile b').html(filename.name);
	$('#'+id+'UploadedFile a').attr('href',PL_FILE_PATH + filename.target_name);
	$('#'+id+'UploadedFile span').attr('ref',index);
}

function creatUploader(id){
	$('.wristForm .clipart li #'+id+'file').hide();
	var html = '<div class="fileLoading" id="'+id+'Loading"><span></span></div><div class="uploadedFile" id="'+id+'UploadedFile"><a href="#" target="_blank"><b>File name goes here</b></a><span>X</span></div>';
	$('#'+id+'file').after(html);
}

//unload functions
// $(window).on('beforeunload', function(){
// if(deleteFiles){
	// $('.uploadedFile span').each(function(){ if($(this).attr('ref')){ $(this).click(); }});
// }
// });
// window.onbeforeunload = function() {
// if(deleteFiles){
	// $('.uploadedFile span').each(function(){ if($(this).attr('ref')){ $(this).click(); }});
// }
// }

//front start clipart
var uploaderFS = new plupload.Uploader({
	runtimes : PL_RUNTIMES,
	browse_button : 'fsfile',
	container: document.getElementById('containerFS'), // ... or DOM Element itself
	url : PL_UPLOADER,
	flash_swf_url : PL_FLASH_SWF_URL,
	silverlight_xap_url : PL_SILVERLIGHT_XAP_URL,
	multi_selection:	false,
	unique_names:	true,
	
	filters : {
		max_file_size : PL_MAX_SIZE,
		mime_types: [
			{title : PL_FILES_TITLE, extensions : PL_ALLOWED_FILES}
		]
	},
	init: {
		PostInit: function() { creatUploader('fs') },
		FilesAdded: function(up, files) {
		uploaderFS.start();
		uploadInitEvent('fs');
		plupload.each(files, function(file) {  });
		},

		UploadProgress: function(up, file) {
			uploadingEvent('fs',file);
		},

		Error: function(up, err) {
			alert("Error #" + err.code + ": " + err.message);
		},
		FileUploaded:	function(up, file, info){
			uploadCompleteEvent(0,'fs',file);
			wrist.UploadedFile.fs = { name:  file.name, file: file.target_name};
		}
	}
});
uploaderFS.init();
//front start clipart

//front end clipart
var uploaderFE = new plupload.Uploader({
	runtimes : PL_RUNTIMES,
	browse_button : 'fefile',
	container: document.getElementById('containerFE'), // ... or DOM Element itself
	url : PL_UPLOADER,
	flash_swf_url : PL_FLASH_SWF_URL,
	silverlight_xap_url : PL_SILVERLIGHT_XAP_URL,
	multi_selection:	false,
	unique_names:	true,
	
	filters : {
		max_file_size : PL_MAX_SIZE,
		mime_types: [
			{title : PL_FILES_TITLE, extensions : PL_ALLOWED_FILES}
		]
	},
	init: {
		PostInit: function() { creatUploader('fe') },
		FilesAdded: function(up, files) {
		uploaderFE.start();
		uploadInitEvent('fe');
		plupload.each(files, function(file) {  });
		},

		UploadProgress: function(up, file) {
			uploadingEvent('fe',file);
		},

		Error: function(up, err) {
			alert("Error #" + err.code + ": " + err.message);
		},
		FileUploaded:	function(up, file, info){
			uploadCompleteEvent(1,'fe',file);
			wrist.UploadedFile.fe = { name:  file.name, file: file.target_name};
		}
	}
});
uploaderFE.init();
//front end clipart

//Back start clipart
var uploaderBS = new plupload.Uploader({
	runtimes : PL_RUNTIMES,
	browse_button : 'bsfile',
	container: document.getElementById('containerBS'), // ... or DOM Element itself
	url : PL_UPLOADER,
	flash_swf_url : PL_FLASH_SWF_URL,
	silverlight_xap_url : PL_SILVERLIGHT_XAP_URL,
	multi_selection:	false,
	unique_names:	true,
	
	filters : {
		max_file_size : PL_MAX_SIZE,
		mime_types: [
			{title : PL_FILES_TITLE, extensions : PL_ALLOWED_FILES}
		]
	},
	init: {
		PostInit: function() { creatUploader('bs') },
		FilesAdded: function(up, files) {
		uploaderBS.start();
		uploadInitEvent('bs');
		plupload.each(files, function(file) {  });
		},

		UploadProgress: function(up, file) {
			uploadingEvent('bs',file);
		},

		Error: function(up, err) {
			alert("Error #" + err.code + ": " + err.message);
		},
		FileUploaded:	function(up, file, info){
			uploadCompleteEvent(2,'bs',file);
			wrist.UploadedFile.bs = { name:  file.name, file: file.target_name};
		}
	}
});
uploaderBS.init();
//Back start clipart

//Back end clipart
var uploaderBE = new plupload.Uploader({
	runtimes : PL_RUNTIMES,
	browse_button : 'befile',
	container: document.getElementById('containerBE'), // ... or DOM Element itself
	url : PL_UPLOADER,
	flash_swf_url : PL_FLASH_SWF_URL,
	silverlight_xap_url : PL_SILVERLIGHT_XAP_URL,
	multi_selection:	false,
	unique_names:	true,
	
	filters : {
		max_file_size : PL_MAX_SIZE,
		mime_types: [
			{title : PL_FILES_TITLE, extensions : PL_ALLOWED_FILES}
		]
	},
	init: {
		PostInit: function() { creatUploader('be') },
		FilesAdded: function(up, files) {
		uploaderBE.start();
		uploadInitEvent('be');
		plupload.each(files, function(file) {  });
		},

		UploadProgress: function(up, file) {
			uploadingEvent('be',file);
		},

		Error: function(up, err) {
			alert("Error #" + err.code + ": " + err.message);
		},
		FileUploaded:	function(up, file, info){
			uploadCompleteEvent(3,'be',file);
			wrist.UploadedFile.be = { name:  file.name, file: file.target_name };
		}
	}
});
uploaderBE.init();
//Back end clipart