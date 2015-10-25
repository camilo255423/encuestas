<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
    private $_id;
	public function authenticate()
	{

	//$usuario=UsuarioFuenteProceso::model()->findByAttributes(array('usuario_proceso'=>$this->username));
        $usuario_roles=DITUSUARIO::model()->findAllByAttributes(array('DOCUMENTO'=>$this->username));
		if($usuario_roles==null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else
                {    
		            //$usuario=UsuarioFuenteProceso::model()->findByAttributes(array('usuario_proceso'=>$this->username));
		           // if($usuario==null)
		           // {
		           	

		           	    foreach($usuario_roles as $rol)
		           	    {	
		            	$fuentes = Fuente::model()->with('fuenteProcesos')->findAllByAttributes(array('nombre'=>$rol->ROL));
		            	    $this->_id=$rol->DOCUMENTO;
		            	 
		            	    foreach($fuentes as $f)
		            	    {
		            	    	
		            	     foreach($f->fuenteProcesos as $fp)
		            	     {	
		            	     	if(null==UsuarioFuenteProceso::model()->
		            	   			findByAttributes(array('usuario_proceso'=>$rol->DOCUMENTO,'id_fuente_proceso'=>$fp->id_fuente_proceso)))
		            	   		{
                                   $nuevo_usuario_fp= new UsuarioFuenteProceso();
                                   $nuevo_usuario_fp->id_usuario_proceso=$rol->DOCUMENTO;
                                   $nuevo_usuario_fp->usuario_proceso=$rol->DOCUMENTO;
                                   $nuevo_usuario_fp->id_fuente_proceso=$fp->id_fuente_proceso;
                                   $nuevo_usuario_fp->save();
                                   
                          
		            	   		}
		            	   		
		            	   	 }
		            	    }
		                }
		            
		           $this->errorCode=self::ERROR_NONE;
                        
                        
                }       
		return !$this->errorCode;
	}
        public function getId()
        {
            return $this->_id;
        }        
       
}