<?php
class Page {

	private static $default;
	private static $pages;
	
	public static function init( array $pages = array(), $default=false ){
	
			self::$pages = $pages;
	
			if( $default !== false ) 			self::$default = $default;
			elseif( $default === false && 
					!empty( self::$pages ) )	self::$default = self::$pages[0];
			else								self::$default = false;
	
	}
	
	public static function validate( $page ){
				
			if( !in_array( $page, self::$pages ) )
					return self::$default;
			return $page;
	
	}
	
	public static function getDefault(){
				
			return self::$default;
	
	}
	
}