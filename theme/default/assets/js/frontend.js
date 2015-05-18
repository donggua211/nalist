//Onload event
$(function() {
	$("#switch_language").change(function() {
		var lang = $(this).val();
		
		if(lang != '') {
			window.location.href = base_url + 'lang/' + lang;
		}
	});
});