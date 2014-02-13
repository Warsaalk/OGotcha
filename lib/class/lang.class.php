<?php
class Language {

	private static $default;
	private static $languages;
	
	public static function init( array $languages = array(), $default=false ){
	
			self::$languages = $languages;
	
			if( $default !== false ) 				self::$default = $default;
			elseif( $default === false && 
					!empty( self::$languages ) )	self::$default = self::$languages[0];
			else									self::$default = false;
	
	}
	
	public static function validate( $lang ){
				
			if( !in_array( $lang, self::$languages ) )
					return self::$default;
			return $lang;
	
	}
	
	public static function getDefault(){
				
			return self::$default;
	
	}
	
}