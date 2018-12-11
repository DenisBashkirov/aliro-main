<#

if( data === undefined )
	data = {};

var atts 				= ( data.atts !== undefined ) ? data.atts : {},
	name 				= kc.std( atts, 'name', 'Button Text'),
	effect 				= kc.std( atts, 'effect', 'cl-effect-1'),
	show_icon 			= kc.std( atts, 'show_icon', 'no'),
	icon 				= kc.std( atts, 'icon', 'fa-leaf'),
	icon_position 		= kc.std( atts, 'icon_position', 'left'),
	link 				= kc.std( atts, 'link', '#'),
	wrap_class 			= kc.std( atts, 'wrap_class', ''),
	data_text 			= '',
	data_icon 			= '',
	button_attributes 	= [],
	cl_class 			= [],
	wrapper_class 		= [];

wrapper_class = kc.front.el_class( atts );
wrapper_class.push( wrap_class );
wrapper_class.push( 'kc-creative-links' );

cl_class.push( 'kc-cl' );
cl_class.push( effect );

link = link.split('|');

button_attributes.push( 'class="kc_button"' );

if( link[0] !== undefined )
	button_attributes.push( 'href="' + link[0] + '"' );

if( link[1] !== undefined )
	button_attributes.push( 'title="' + link[1] + '"' );

if( link[2] !== undefined )
	button_attributes.push( 'target="' + link[2] + '"' );

if( show_icon == 'yes' ) {
	data_icon = ' <i class="'+ icon +'"></i> ';
	if ( icon_position == 'left' )
		data_text = data_icon + name;

	if ( icon_position == 'right' )
		data_text = name + data_icon;
} else {
	data_text = name;
}

#>

<div class="{{{wrapper_class.join(' ')}}}">
	<div class="{{{cl_class.join(' ')}}}">
		<a class="cl-text" {{{button_attributes.join(' ')}}} data-hover="{{{name}}}">
			<span data-hover="{{{name}}}">{{{data_text}}}</span>
		</a>
	</div>
</div>