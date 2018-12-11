<#

if( data === undefined )
	data = {};

var atts 				= ( data.atts !== undefined ) ? data.atts : {},
	icon 				= kc.std( atts, 'icon', 'fa-leaf'),
	link 				= kc.std( atts, 'link', '#'),
	effect 				= kc.std( atts, 'effect', 'slide-up'),
	animates 			= kc.std( atts, 'animates', 'bounce'),
	delay 				= kc.std( atts, 'delay', '3'),
	extra_class 		= kc.std( atts, 'extra_class', ''),
	data_icon			= '',
	data_button			= '',
	button_attributes 	= [],
	data_content		= '',
	wrapper_class 		= [];

wrapper_class = kc.front.el_class( atts );
wrapper_class.push( extra_class );
wrapper_class.push( 'kc-highlight-box' );
wrapper_class.push( 'kc-hb-'+effect );

if ( icon !== '' ) {
	data_icon += '<div class="kc-hb-icon"><i class="' + icon + '"></i></div>';
}

link = link.split('|');

button_attributes.push( 'class="kc-hb-overlay"' );

if( link[0] !== undefined )
	button_attributes.push( 'href="' + link[0] + '"' );

if( link[1] !== undefined )
	button_attributes.push( 'title="' + link[1] + '"' );

if( link[2] !== undefined )
	button_attributes.push( 'target="' + link[2] + '"' );

if( data.content === undefined ){
	data.content = kc.front.do_shortcode('[kc_title text="QSBleGFtcGxlIGFib3V0IEhpZ2hsaWdoQm94" type="h3"]');
}

data_content = data.content.replace('the_nested_element#', 'the_nested_element' );

#>

<div class="{{{wrapper_class.join(' ')}}}" data-delay="{{{delay}}}" data-animate="kc-hb-{{{animates}}}">

	<div class="kc-hb-content">{{{data_content}}}</div>
	{{{data_icon}}}
	<a {{{button_attributes.join(' ')}}}>&nbsp;</a>

</div>
<#
	data.callback = function( wrp, $ ){
		kc_highlight();
	}
#>
