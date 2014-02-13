<?php
class FormManager extends Connector {

		public function __construct() {}
	
		public function handleCr( $form ){
						
				$vl = $this->Main()->getValidator();
				
				$vl->addVariable( 'report', array('min=1'), 'string' );
				$vl->addVariable( 'theme', array('select'), 'string' );
				$vl->addVariable( 'middletext', array(), 'string', false );
				$vl->addVariable( 'merge', array(), 'integer', false );
				$vl->addVariable( 'hidetime', array(), 'integer', false ); // Use integer type for this checkbox as it doesn't exits in a group
				$vl->addVariable( 'raids', array(), 'string', false );
				$vl->addVariable( 'harvest', array(), 'string', false );
				$vl->addVariable( 'deuterium', array(), 'string', false );
					
				$vl->validate( $form );	
					
				if( $vl->isValid() ){					
						
						//$this->Main()->addInfo( new Info( 'Valid Cr', Info::SUCCESS ) );
				
				}else{
				
						$this->Main()->addInfo( new Info( $this->Main()->getDict()->getVal('Invalid post'), Info::ERROR ) );
				
				}
		
		}

}