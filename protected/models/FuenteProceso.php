<?php

/**
 * This is the model class for table "fuente_proceso".
 *
 * The followings are the available columns in table 'fuente_proceso':
 * @property integer $id_fuente_proceso
 * @property string $nombre
 * @property string $descripcion
 * @property string $enunciado
 *
 * The followings are the available model relations:
 * @property PreguntaFuenteProceso[] $preguntaFuenteProcesos
 */
class FuenteProceso extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'fuente_proceso';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre', 'required'),
			array('nombre', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_fuente_proceso, nombre, descripcion, enunciado', 'safe', 'on'=>'search'),
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
                    'preguntas' => array(self::MANY_MANY, 'PreguntaProceso', 'pregunta_fuente_proceso(id_pregunta_proceso,id_fuente_proceso)','order'=>'orden'),
			'preguntaFuenteProcesos' => array(self::HAS_MANY, 'PreguntaFuenteProceso', 'id_fuente_proceso'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_fuente_proceso' => 'Id Fuente Proceso',
			'nombre' => 'Nombre',
			'descripcion' => 'Descripcion',
			'enunciado' => 'Enunciado',
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

		$criteria->compare('id_fuente_proceso',$this->id_fuente_proceso);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('enunciado',$this->enunciado,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return FuenteProceso the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
