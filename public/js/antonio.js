$(document).ready(function(){
	$('textarea').on('keyDown', function(event){
		if(event.keyCode == 13)
			if(!event.shiftKey) $('#commentbox').submit();
	});

	$('#commentbox').on('submit', function(){
		document.write("Comment Form Submitted!");
	});
});

function chkComment(){
	var content = document.getElementById("commentbox").value;
	if(content.length < 1){
		window.alert("This field cant be left empty");
		return false;
	}else
		return true;
}	