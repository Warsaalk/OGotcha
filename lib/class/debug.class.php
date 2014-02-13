<?php
class Debug {
	//Print arrays in readable format
	public static function arr( $arr ){
		print	'<pre>';
		print_r ($arr);
		print	'</pre>';
	}
	//Print string on new line
	public static function str( $str ){
		print '<div>';
		print ($str);
		print '</div>';
	}

}