<?php

class FuenteController extends Controller
{
  
         /**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index'),
				'users'=>array('@'),
			),
			
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionIndex()
	{
            
            $i=0;
            if(isset($_POST['Respuesta']))
            {
                
              foreach($_POST['Respuesta'] as $respuesta)
                {
                        $item = new Respuesta();
                        $item->attributes=$respuesta;
                        $item->save();
                    
                }
             
            }
        $idUsuario = Yii::app()->user->getId();      
        
        $usuario=UsuarioFuenteProceso::model()->with('respuestas')->findByAttributes(array('id_usuario_proceso'=>$idUsuario));
       
        if($usuario==null)
        {
            
            $this->redirect(array('site/logout'));
            
        }    
        $fuente = FuenteProceso::model()->with('preguntas')->findByPk($usuario->id_fuente_proceso);  
        $respuestas=array();
        foreach ($fuente->preguntas as $i=>$pregunta)
        {
            $respuesta = new Respuesta();
            $respuesta->id_fuente_proceso = $usuario->id_fuente_proceso;
            $respuesta->id_usuario_proceso = $usuario->id_usuario_proceso;
            $respuesta->id_pregunta_proceso = $pregunta->id_pregunta_proceso;
            array_push($respuestas, $respuesta);
        }
        $this->render('index',array(
			'fuente'=>$fuente,
                        'respuestas'=>$respuestas,
		));
		
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}