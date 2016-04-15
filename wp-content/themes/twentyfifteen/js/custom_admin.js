( function( $ ) {

	$( document ).ready(function() {

		//linkanje do original arhivske strani za lažje pregledovanje
		var original_link = $('#postcustomstuff #list-table textarea:last').text();
		var original_link_html = '<div id="edit-slug-box" class="hide-if-no-js">\
								<strong>Originalna povezava:</strong>\
								<span id="sample-permalink" tabindex="-1"><a href="'+original_link+'">'+original_link+'</a></span>\
								</div>';
		$('.inside:first').append(original_link_html);


		setTimeout(function(){
			var iframe = $("#content_ifr").contents()
	    	iframe.find("head").append('<link rel="stylesheet" id="custom_admin-css" href="/wp-content/themes/twentyfifteen/css/custom_admin.css" type="text/css" >');
	    	iframe.find('body').mark(new RegExp("[\\d]{1,2}", "g"), {markData: {"class": "marked-clen"}});
	    	iframe.find('body').mark(["člen", "Člen"], {markData: {"class": "marked-clen"}});

	    	iframe.find('body').mark(new RegExp("[A-ZČŽŠ][\\wČŽŠčšž]+[ ]+[A-ZČŽŠ][\\wČŽŠčšž]+", "g"), {markData: {"class": "marked-person"}});
		}, 1000);

		$('#publish').hover(function() {
			var iframe = $("#content_ifr").contents()
			iframe.find(".marked-person , .marked-clen").contents().unwrap();
		});
		   
	});


} )( jQuery );
