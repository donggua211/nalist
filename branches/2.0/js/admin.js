//Onload event
$(function() {
	$( "h3.menu-bar" ).click(function() {
		$( this ).toggleClass( "closed" );
		$( this ).next().toggleClass( "hide" );
		
		if ($(this).next().is(':visible')) {
			$.cookie($(this).attr('id'), 'expanded', {path: '/'});
		}

		if ($(this).next().is(':hidden')) {
			$.cookie($(this).attr('id'), 'collapsed', {path: '/'});
		}
	});
	$("h3.menu-bar").each(function() {
		var verticalNav = $.cookie( $(this).attr('id') );
		if (verticalNav == 'collapsed') {
			$( this ).toggleClass( "closed" );
			$( this ).next().toggleClass( "hide" );
		}
	});
	
	$( "input[name='remove']" ).click(function() {
		return confirm("确定删除吗？");
	});
	$( ".remove" ).click(function() {
		return confirm("确定删除吗？");
	});
});