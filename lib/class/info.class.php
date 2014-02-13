<?php
class Info{
	
	const	INFORMATION = 'information',
			SUCCESS		= 'success',
			WARNING		= 'warning',
			ERROR		= 'error';
	
	private $_message,
			$_type,
			$_types 	= array(
	
					'information'	=> array( 'img' => 'information.png' ),
					'success'		=> array( 'img' => 'success.png' ),
					'warning'		=> array( 'img' => 'warning.png' ),
					'error'			=> array( 'img' => 'error.png' )
			
			);
	
	public function __construct( $mess, $type=self::SUCCESS ){	
	
			$this->_message	= $mess;
			$this->_type	= $type;
			
	}
	
	public function getMessage(){
			return $this->_message;
	}
	
	public function getType(){
			return $this->_type;
	}
	
	public function getImage(){
			return __IMAGES . $this->_types[ $this->_type ]['img'];
	}
	
}