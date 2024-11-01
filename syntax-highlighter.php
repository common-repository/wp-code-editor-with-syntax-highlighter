<?php
/*
Plugin Name: Wordpress Code Editor with Syntax Highlighter
Plugin URI: http://wppluginsj.sourceforge.jp/syntax-highlighter/
Description: Converts the default plain text editor in wordpress to a pretty code editor with support for xml,php,css,html and javascript. Also includes match tag, indent, match brackets functions.  
Version: 1.0.0
Author: odubanjo goke
Author URI: http://ghowkay.com

*/


// add and enqueue scripts

add_action( 'admin_head', 'add_scripts' );


function add_scripts() {
	//set paths
		$codemirror_css = plugin_dir_url( __FILE__ ) . '/lib/codemirror.css';
		$codemirror_js = plugin_dir_url(__FIlE__) . '/lib/codemirror.js';
		$matchbrackets = plugin_dir_url(__FILE__) . 'addon/edit/matchbrackets.js';
	    $htmlmixed = plugin_dir_url(__FILE__) . 'htmlmixed/htmlmixed.js';
	    $xml = plugin_dir_url(__FILE__) . 'xml/xml.js';
		$javascript = plugin_dir_url(__FILE__) . 'javascript/javascript.js';
		$css = plugin_dir_url(__FILE__) . 'css/css.js';
	$clike = plugin_dir_url(__FILE__) . 'clike/clike.js';
	$php = plugin_dir_url(__FILE__) . 'php/php.js';	
	$show_hint_css = plugin_dir_url(__FILE__). 'addon/hint/show-hint.css';
	$show_hint_js = plugin_dir_url(__FILE__). 'addon/hint/show-hint.js';
	$css_hint = plugin_dir_url(__FILE__). 'addon/hint/css-hint.js';
	$match_tags = plugin_dir_url(__FILE__). '/addon/edit/matchtags.js';
	$xml_fold = plugin_dir_url(__FILE__). '/addon/fold/xml-fold.js';

	
    echo  '<script src="'.$css_hint.'"></script>';
	echo '<link rel="stylesheet" href="'.$codemirror_css.'" type="text/css">';
   echo '<script src="'.$codemirror_js.'"></script>';
   echo '<script src="'.$matchbrackets.'"></script>';
   echo '<script src="'.$xml_fold.'"></script>';
	echo '<script src="'.$match_tags.'"></script>';
	echo '<link rel="stylesheet" href="'.$show_hint_css.'">';
    echo  '<script src="'.$show_hint_js.'"></script>';
echo '<script src="'.$htmlmixed.'"></script>';
echo '<script src="'.$xml.'"></script>';
echo '<script src="'.$javascript.'"></script>';
echo '<script src="'.$css.'"></script>';
echo '<script src="'.$clike.'"></script>';
echo '<script src="'.$php.'"></script>';

echo '<style type="text/css">
 #template div {
     margin-right: 0 !important; 
}
</style>';
	

}


add_action( 'admin_footer', 'add_syntax' );

function add_syntax() {
echo " <script>
      var editor = CodeMirror.fromTextArea(document.getElementById('newcontent'), {
        lineNumbers: true,
        matchBrackets: true,
        mode: 'application/x-httpd-php-open',
        indentUnit: 4,
		matchTags: {bothTags: true},
        indentWithTabs: true
      });
    </script>";


}

?>