<?php
class View{
	
	private $_vars = array(),
			$main;
			
	public	$tpl;
	
	public function __construct( $main ){
		
		$this->tpl 	= new stdClass;
		$this->main = $main;
		
		$this->_vars['scripts_top']		= '';
		$this->_vars['scripts_bottom']	= '';
		
		$this->addCSS( __CSS.'main.css' );
		
	}
		
	public function set_value( $key, $value ){
		$this->_vars[$key] = $value;
	}
	
	public function get_value( $key ){
		return $this->_vars[$key];
	}
	
	public function merge( $array ){
		$this->_vars = array_merge( $this->_vars, $array );	
	}	
	
	public function addScript( $script, $place='top' ){
		if( isset($this->_vars['scripts_'.$place]) )
			$this->_vars['scripts_'.$place] .= "\n\t";
		else
			$this->_vars['scripts_'.$place] = "";
			
		$this->_vars['scripts_'.$place] .= '<script type="text/javascript" src="'. $script .'"></script>';
	}
	
	public function addCSS( $css, $cond=false ){
		if( isset($this->_vars['css']) )
			$this->_vars['css'] .= "\n\t";
		else
			$this->_vars['css'] = "";
		
		if( $cond !== false )	$this->_vars['css'] .= '<!--[if '. $cond .']>';
								$this->_vars['css'] .= '<link rel="stylesheet" type="text/css" href="'. $css .'" media="screen" />';
		if( $cond !== false ) 	$this->_vars['css'] .= '<![endif]-->';
	}
	
	public function getInfo(){
		return $this->main->getInfo();
	}
	
	public function hasInfo(){
		if( count( $this->main->getInfo() ) > 0 ) return true;
		return false;
	}
	
	public function getDict(){
		return $this->main->getDict();
	}
	
	public function getMain(){
		return $this->main;
	}
	
	public function render(){
				
			$this->tpl->info 	= Parser::parse( $this, 'info' );
			$this->tpl->head 	= Parser::parse( $this, 'head' );
			$this->tpl->footer 	= Parser::parse( $this, 'footer' );	
			$this->tpl->page 	= Parser::parse( $this, $this->main->getPage() );
	
				
			return Parser::parse( $this, 'base' );
	
	}
}