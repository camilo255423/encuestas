<?php

/**
 * This is the model class for table "pregunta_fuente_proceso".
 *
 * The followings are the available columns in table 'pregunta_fuente_proceso':
 * @property integer $id_pregunta_proceso
 * @property integer $id_fuente_proceso
 *
 * The followings are the available model relations:
 * @property FuenteProceso $idFuenteProceso
 * @property PreguntaProceso $idPreguntaProceso
 */
class PreguntaFuenteProceso extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pregunta_fuente_proceso';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_pregunta_proceso, id_fuente_proceso', 'required'),
			array('id_pregunta_proceso, id_fuente_proceso', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_pregunta_proceso, id_fuente_proceso', 'safe', 'on'=>'search'),
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
			'idFuenteProceso' => array(self::BELONGS_TO, 'FuenteProceso', 'id_fuente_proceso'),
			
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_pregunta_proceso' => 'Id Pregunta Proceso',
			'id_fuente_proceso' => 'Id Fuente Proceso',
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
		$criteria->compare('id_fuente_proceso',$this->id_fuente_proceso);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PreguntaFuenteProceso the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
