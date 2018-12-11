<#

if( data === undefined )
	data = {};

var atts 				= ( data.atts !== undefined ) ? data.atts : {},
	text1 				= kc.std( atts, 'text1', 'Left Button'),
	link1 				= kc.std( atts, 'link1', '#'),
	show_icon1 			= kc.std( atts, 'show_icon1', 'no'),
	icon1 				= kc.std( atts, 'icon1', 'fa-leaf'),
	icon_position1 		= kc.std( atts, 'icon_position1', 'left'),
	text2 				= kc.std( atts, 'text2', 'Right Button'),
	link2 				= kc.std( atts, 'link2', '#'),
	show_icon2 			= kc.std( atts, 'show_icon2', 'no'),
	icon2 				= kc.std( atts, 'icon2', 'fa-leaf'),
	icon_position2 		= kc.std( atts, 'icon_position2', 'left'),
	middle_text 		= kc.std( atts, 'middle_text', 'none'),
	icon3 				= kc.std( atts, 'icon3', 'fa-leaf'),
	text_middle 		= kc.std( atts, 'text_middle', 'Text'),
	extra_class 		= kc.std( atts, 'extra_class', ''),
	text_button_1		= '',
	text_button_2		= '',
	text3				= '',
	button_attributes1 	= [],
	button_attributes2 	= [],
	wrapper_class 		= [];

wrapper_class = kc.front.el_class( atts );
wrapper_class.push( 'kc-dual-button' );
wrapper_class.push( extra_class );

link1 = link1.split('|');
if( link1[0] !== undefined )
	button_attributes1.push( 'href="' + link1[0] + '"' );

if( link1[1] !== undefined )
	button_attributes1.push( 'title="' + link1[1] + '"' );

if( link1[2] !== undefined )
	button_attributes1.push( 'target="' + link1[2] + '"' );

link2 = link2.split('|');
if( link2[0] !== undefined )
	button_attributes2.push( 'href="' + link2[0] + '"' );

if( link2[1] !== undefined )
	button_attributes2.push( 'title="' + link2[1] + '"' );

if( link2[2] !== undefined )
	button_attributes2.push( 'target="' + link2[2] + '"' );

if('yes' === show_icon1){
	if( icon_position1 == 'left' ){
		text_button_1 = '<i class="' + icon1 + '"></i> ' + text1;
	}else{
		text_button_1 = text1 + '<i class="' + icon1 + '"></i>';
	}
} else {
	text_button_1 = text1;
}

if('yes' === show_icon2){
	if( icon_position2 == 'left' ){
		text_button_2 = '<i class="' + icon2 + '"></i> ' + text2;
	}else{
		text_button_2 = text2 + '<i class="' + icon2 + '"></i>';
	}
} else {
	text_button_2 = text2;
}

if( middle_text == 'text' ){
	text3 = '<div class="kc-middle-text"><span>' + text_middle + '</span></div>';
}

if( middle_text == 'icon' ){
	text3 = '<div class="kc-middle-text"><i class="' + icon3 + '"></i></div>';
}

#>

<div class="{{{wrapper_class.join(' ')}}}">
	<div class="kc-dual-button-wrap">
		<div class="kc-dual-button-one">
			<a {{{button_attributes1.join(' ')}}}>{{{text_button_1}}}</a>
			{{{text3}}}
		</div>
		<div class="kc-dual-button-two">
			<a {{{button_attributes2.join(' ')}}}>{{{text_button_2}}}</a>
		</div>
	</div>
</div>