<?php

/**
 * This is the model class for table "pregunta_proceso".
 *
 * The followings are the available columns in table 'pregunta_proceso':
 * @property integer $id_pregunta_proceso
 * @property string $enunciado
 * @property integer $id_tipo_respuesta
 *
 * The followings are the available model relations:
 * @property CaracteristicaPreguntaProceso[] $caracteristicaPreguntaProcesos
 * @property PreguntaFuenteProceso $preguntaFuenteProceso
 * @property TipoRespuesta $idTipoRespuesta
 */
class PreguntaProceso extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pregunta_proceso';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('enunciado, id_tipo_respuesta', 'required'),
			array('id_tipo_respuesta', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_pregunta_proceso, enunciado, id_tipo_respuesta', 'safe', 'on'=>'search'),
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
                        'fuentes' => array(self::MANY_MANY, 'FuenteProceso', 'pregunta_fuente_proceso(id_pregunta_proceso,id_fuente_proceso)'),
			'caracteristicas' => array(self::HAS_MANY, 'CaracteristicaPreguntaProceso', 'id_pregunta_proceso'),
			'preguntaFuenteProceso' => array(self::HAS_ONE, 'PreguntaFuenteProceso', 'id_pregunta_proceso'),
			'idTipoRespuesta' => array(self::BELONGS_TO, 'TipoRespuesta', 'id_tipo_respuesta'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_pregunta_proceso' => 'Id Pregunta Proceso',
			'enunciado' => 'Enunciado',
			'id_tipo_respuesta' => 'Id Tipo Respuesta',
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

		$criteria->compare('id_pregunta_proceso',$this->id_pregunta_proceso);
		$criteria->compare('enunciado',$this->enunciado,true);
		$criteria->compare('id_tipo_respuesta',$this->id_tipo_respuesta);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PreguntaProceso the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
