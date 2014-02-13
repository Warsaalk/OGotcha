<?php
class Validator extends Connector {

		private $_vars 		= array(),
				$_valid 	= true,
				$_validated	= false;
		
		public static function cleanInput( $x, $type='string' ){
		
				$x = trim( $x );
				switch( $type ){
				
						case 'multiple-integer'	:
						case 'checkbox-integer'	:
						case 'integer'	:
							$x = filter_var( $x, FILTER_VALIDATE_INT);
							break;
						case 'multiple-email'	:
						case 'email'	:
							$x = filter_var( $x, FILTER_VALIDATE_EMAIL);
							break;
						case 'multiple-date'	:
						case 'date'	:
							$x = filter_var( $x, FILTER_VALIDATE_REGEXP, array("options"=>array('regexp'=>'/\d{4}\d{2}\d{2}/')) ); //Format yyyy-mm-dd
							break;
						case 'multiple-string'	:
						case 'checkbox-string'	:
						case 'multiple'	:
						case 'checkbox'	:
						case 'string'	:
						default :
							$x = htmlentities( $x, ENT_QUOTES, "UTF-8");
				
				}

				return $x;
			
		}
		
		/***
		*
		* Example : addVariable ( $var , array( 'max=10' ), integer, false, 10 )
		*
		***/
		public function addVariable( $name, $rules=array(), $type='string', $required=true, $default='' ){
		
				$this->_vars[ $name ] = array( 
						'type' 	=> $type,
						'rules' => $rules,
						'req'	=> $required,
						'error'	=> '',
						'value' => $default
				);
		
		}
		
		public function getVariable( $name, $index=false ){	
			
				if( $index !== false && isset( $this->_vars[ $name ][ $index ] ) ) 
					return $this->_vars[ $name ][ $index ];	
				return ( isset( $this->_vars[ $name ] ) ? $this->_vars[ $name ] : null ); //Avoid irritating notices		
				
		}	
		public function getVariables(){			return $this->_vars;			}
		public function isValid(){				return $this->_valid;			}
		public function isValidated(){			return $this->_validated;		}
		
		public function validate( $form, $files=array() ){
			
				//Loop over all desired variables
				// watchout the properties of a variable are passed by reference
				foreach( $this->_vars as $name => &$props ){
				
						if( isset( $form[ $name ] ) ){
						
								$post = $form[ $name ]; //Get variable from form
								if( $props['req'] || is_array($post) || strlen($post)>0 ){ //Validate if required or filled in
									
										switch( $props['type'] ){
										
												case 'integer'	: 	$post = self::cleanInput( $post, $props['type'] ); 
																	if( !$post && $post!=0 ) $this->_valid = false;
																	break;
												case 'email'	: 	$post = self::cleanInput( $post, $props['type'] ); 
																	if( !$post ){
																		$props['error'] = $this->Main()->getDict()->getVal('invalid_email');
																		$this->_valid = false;
																	}
																	break;
												case 'date'		:	$post = self::cleanInput( $post, $props['type'] );
																	if( !$post ){
																		$props['error'] = $this->Main()->getDict()->getVal('invalid_date');
																		$this->_valid = false;
																	}
																	break;
												case 'multiple-email'	:
												case 'multiple-string'	:
												case 'multiple-date'	:
												case 'multiple-integer'	:
												case 'checkbox-string'	:
												case 'checkbox-integer'	:
												case 'multiple'	:
												case 'checkbox'	:	foreach( $post as $i => $val ){
																		$post[$i] = self::cleanInput( $val, $props['type'] );
																		if( !$post[$i] ){ 
																			$this->_valid = false;
																			$props['error'] = $this->Main()->getDict()->getVal('invalid_data');
																		}
																	}
																	break;
												case 'password'	: 	break; //A password can't be changed or cleaned in any way
												case 'string'	:
												default			:  	$post = self::cleanInput( $post );
																	if( !$post ) $this->_valid = false;
										
										}
										
										foreach( $props['rules'] as $id => $rule ){
										
												$rule = explode( '=', $rule );
												
												switch( $rule[0] ){
												
														case 'max': 	if( strlen( $post ) > $rule[1] )			{ $props['error'] = $this->Main()->getDict()->getVal('invalid_max') . $rule[1]; $this->_valid = false; } break;
														case 'min': 	if( !$post || strlen( $post ) < $rule[1] )	{ $props['error'] = $this->Main()->getDict()->getVal('invalid_min') . $rule[1]; $this->_valid = false; } break;
														case 'select': 	if( strlen( $post ) < 1 )					{ $props['error'] = $this->Main()->getDict()->getVal('invalid_select'); $this->_valid = false; } break;
														case 'regex': 	if( !preg_match( $rule[1], $post ) )		{ $props['error'] = $this->Main()->getDict()->getVal('invalid_format'); $this->_valid = false; } break;
														default;
													
												}
										
										}

										$props['value'] 	= $post;
									
								}
							
						}else{
						
								$post = NULL;
								
								if( $props['req'] ){
									
										switch( $props['type'] ){
											
												case 'integer'	: 	$post = 0; 				break;
												case 'date'		:	$post = "1970-01-01"; 	break;
												case 'checkbox'	:	$post = array();		break;
												case 'email'	:
												case 'string'	:
												default			:  	$post = "";
										
										}
										
										$props['error'] = 'Value not submitted!';
									
										$this->_valid 	= false;
								
								}
								
								$props['value'] = $post;
						
						}
						
				}
				
				$this->_validated = true;

		}

}