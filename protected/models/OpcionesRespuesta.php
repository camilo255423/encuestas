<?php

/**
 * This is the model class for table "opciones_respuesta".
 *
 * The followings are the available columns in table 'opciones_respuesta':
 * @property integer $id_opcion
 * @property integer $respuesta
 * @property integer $valor
 * @property integer $id_tipo_respuesta
 *
 * The followings are the available model relations:
 * @property TipoRespuesta $idTipoRespuesta
 */
class OpcionesRespuesta extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'opciones_respuesta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('respuesta, valor, id_tipo_respuesta', 'required'),
			array('respuesta, valor, id_tipo_respuesta', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_opcion, respuesta, valor, id_tipo_respuesta', 'safe', 'on'=>'search'),
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
			'idTipoRespuesta' => array(self::BELONGS_TO, 'TipoRespuesta', 'id_tipo_respuesta'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_opcion' => 'Id Opcion',
			'respuesta' => 'Respuesta',
			'valor' => 'Valor',
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

		$criteria->compare('id_opcion',$this->id_opcion);
		$criteria->compare('respuesta',$this->respuesta);
		$criteria->compare('valor',$this->valor);
		$criteria->compare('id_tipo_respuesta',$this->id_tipo_respuesta);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return OpcionesRespuesta the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
