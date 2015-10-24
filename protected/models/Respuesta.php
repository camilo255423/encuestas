<?php

/**
 * This is the model class for table "respuesta".
 *
 * The followings are the available columns in table 'respuesta':
 * @property integer $id_usuario_proceso
 * @property integer $id_fuente_proceso
 * @property integer $id_pregunta_proceso
 * @property integer $id_opcion
 *
 * The followings are the available model relations:
 * @property OpcionesRespuesta $idOpcion
 * @property UsuarioFuenteProceso $idUsuarioProceso
 * @property FuenteProceso $idFuenteProceso
 * @property PreguntaProceso $idPreguntaProceso
 */
class Respuesta extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'respuesta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_usuario_proceso, id_fuente_proceso, id_pregunta_proceso, id_opcion', 'required','message'=>'Por favor seleccione una opción'),
			array('id_usuario_proceso, id_fuente_proceso, id_pregunta_proceso, id_opcion', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_usuario_proceso, id_fuente_proceso, id_pregunta_proceso, id_opcion', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'idOpcion' => array(self::BELONGS_TO, 'OpcionesRespuesta', 'id_opcion'),
			'idUsuarioProceso' => array(self::BELONGS_TO, 'UsuarioFuenteProceso', 'id_usuario_proceso'),
			'idFuenteProceso' => array(self::BELONGS_TO, 'FuenteProceso', 'id_fuente_proceso'),
			'idPreguntaProceso' => array(self::BELONGS_TO, 'PreguntaProceso', 'id_pregunta_proceso'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_usuario_proceso' => 'Id Usuario Proceso',
			'id_fuente_proceso' => 'Id Fuente Proceso',
			'id_pregunta_proceso' => 'Id Pregunta Proceso',
			'id_opcion' => 'Id Opcion',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_usuario_proceso',$this->id_usuario_proceso);
		$criteria->compare('id_fuente_proceso',$this->id_fuente_proceso);
		$criteria->compare('id_pregunta_proceso',$this->id_pregunta_proceso);
		$criteria->compare('id_opcion',$this->id_opcion);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Respuesta the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
