<?php
class Parser{

		public static function parse( $self, $page, $path = __TEMPLATE ){
				
				global $tplExt;		
		
				ob_start();
				require $path . $page . $tplExt;
				$content = ob_get_clean();
				return $content;
		
		}

}