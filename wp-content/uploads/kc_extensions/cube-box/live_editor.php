<#

if( data === undefined )
	data = {};

var atts 				= ( data.atts !== undefined ) ? data.atts : {},
	show_on 			= kc.std( atts, 'show_on', 'none'),
	icon 				= kc.std( atts, 'icon', 'fa-leaf'),
	image 				= kc.std( atts, 'image', ''),
	image_size 			= kc.std( atts, 'image_size', 'full'),
	title 				= kc.std( atts, 'title', 'Insert Title'),
	desc 				= ( atts['desc'] !== undefined )? kc.tools.base64.decode( atts['desc'] ) : '',
	vertical 			= kc.std( atts, 'vertical', 'no'),
	effect 				= kc.std( atts, 'effect', 'top'),
	extra_class 		= kc.std( atts, 'extra_class', ''),
	data_img			= '',
	data_title			= '',
	data_desc			= '',
	data_icon			= '',
	data_content		= '',
	wrapper_class 		= [];

wrapper_class = kc.front.el_class( atts );
wrapper_class.push( extra_class );
wrapper_class.push( 'kc-cbx' );
wrapper_class.push( 'kc-cbx-'+effect );
if( vertical == 'yes' )
	wrapper_class.push( 'kc-cbx-middle' );


if ( image > 0 ) {
	image 	= image.replace( /[^\d]/, '' );
	img_link 	= ajaxurl + '?action=kc_get_thumbn&id=' + image + '&size=full';

	data_img += '<div class="kc-cbx-image">';
		data_img += '<img src="'+ img_link +'" alt="">';
	data_img += '</div>';
}

if ( title !== '' ) {
	data_title += '<div class="kc-cbx-title">'+ title +'</div>';
}

if ( desc !== '' ) {
	
	data_desc += '<div class="kc-cbx-desc">'+ kc.tools.base64.decode( desc ) +'</div>';
}

if ( icon !== '' ) {
	data_icon += '<div class="kc-cbx-icon"><i class="' + icon + '"></i></div>';
}

if( data.content === undefined ){
	data.content = kc.front.do_shortcode('[kc_title text="VGhpcyBpcyBhIEN1YmVCb3g=" type="h3"]');
}
data_content = data.content.replace('the_nested_element#', 'the_nested_element' );

#>

<div class="{{{wrapper_class.join(' ')}}}">
	<div class="kc-cbx-front">
		<div class="kc-cbx-front-content">
			<div class="kc-cbx-box-content">
				<# switch ( show_on ) {
					case 'icon':
				#>
						{{{data_icon}}}
				<#
					break;
					case 'image':
				#>
						{{{data_img}}}
				<#
					break;
					default:

					break;
				} #>

				{{{data_title}}}
				{{{data_desc}}}
			</div>
		</div>
	</div>

	<div class="kc-cbx-back">
		<div class="kc-cbx-back-content">
			<div class="kc-cbx-box-content">{{{data_content}}}</div>
		</div>
	</div>
</div>
