(function () {
	jQuery(document).ready(function($) {  
		 
		$('body').delegate(".input_datetime", 'hover', function(e){
	            e.preventDefault();
	            $(this).datepicker({
		               defaultDate: "",
		               dateFormat: "yy-mm-dd",
		               numberOfMonths: 1,
		               showButtonPanel: true,
	            });
         });

		var hides = ['shu_audio_link','shu_link_link','shu_link_text','shu_video_link','shu_gallery_files'];
		var shows = {
			audio:['shu_audio_link'],
			video:['shu_video_link','shu_video_text'],
			link:['shu_link_link'],
			gallery:['shu_gallery_files']	
		}
		$( '.post-type-post #post-formats-select input' ).click( function(){
			 $(hides).each( function( i, item ){
			 	$("[name="+item+']').parent().parent().hide();
			 } );
			 var s = $(this).val();
			 if( shows[s] != null ){
			 	$(shows[s]).each( function( i, is ){
			 		$("[name="+is+']').parent().parent().show();
				 } );
			 }
		} );
	});	
} )( jQuery );