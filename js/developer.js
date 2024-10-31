jQuery(document).ready(function($){

	$('#publishLead').click(function(){
		var lead_bar_text = $('#lead_bar_text').val();

		var error = 0;
		
		if(lead_bar_text == ""){
			$('#lead_bar_text_error').text('This field is required');
			error++;
		}else if(lead_bar_text !== ''){
			$('#lead_bar_text_error').text('');
		}
		
		if(error > 0){
			return false;
		}else{
			return true;
		}
		
	});

});
function copy_nav(element_id){
	
	var aux = document.createElement("div");
	aux.setAttribute("contentEditable", true);
	aux.innerHTML = document.getElementById(element_id).innerHTML;
	aux.setAttribute("onfocus", "document.execCommand('selectAll',false,null)"); 
	document.body.appendChild(aux);
	aux.focus();
	document.execCommand("copy");
	document.body.removeChild(aux);
	//var link = document.createElement("a");
	document.getElementById('copybtn').innerHTML ='Copied';
	return false;

}