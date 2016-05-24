jQuery(document).ready( function($) {
		jQuery("#author").	change(function(){
		
		var author = this.value;
		var dir_url = $('#dir_url').val();
		  
		  var xhttp;
		  if (author.length == 0) { 
			document.getElementById("txtHint").innerHTML = "";
			return;
		  }
		  xhttp = new XMLHttpRequest();
		  xhttp.onreadystatechange = function() {
			if (xhttp.readyState == 4 && xhttp.status == 200) {
			  document.getElementById("txtHint").innerHTML = xhttp.responseText;
			}
		  };
		  xhttp.open("GET", dir_url+"/users-post/getrecords.php?q="+author, true);
		  xhttp.send(); 
		
	});
});