<?php

/**
 * This is the model class for table "blorghs".
 *
 * The followings are the available columns in table 'blorghs':
 * @property string $category
 * @property string $teaser
 * @property string $status
 * @property string $type
 * @property integer $updated
 * @property integer $created
 * @property string $photo
 * @property string $body
 * @property integer $id
 * @property string $title
 */
class Blorgh extends CActiveRecord
{
    const NOTPUBLISHED = 0;
    const PUBLISHED = 1;
    const ARCHIVED = 2;

    public $publish_time;

	/**
	 * Returns the static model of the specified AR class.
	 * @return Blorgh the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'blorghs';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array( 'title,type', 'required' ),
			array('updated, created, publish_date', 'numerical', 'integerOnly'=>true),
			array('category, status, type', 'length', 'max'=>50),
			array('photo, title, publish_time', 'length', 'max'=>100),
			array('teaser, body', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('category, teaser, status, type, updated, created, photo, body, id, title', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'category' => 'Category',
			'teaser' => 'Teaser',
			'status' => 'Status',
			'type' => 'Type',
			'updated' => 'Updated',
			'created' => 'Created',
			'photo' => 'Photo',
			'body' => 'Body',
			'id' => 'ID',
			'title' => 'Title',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('category',$this->category,true);
		$criteria->compare('teaser',$this->teaser,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('updated',$this->updated);
		$criteria->compare('created',$this->created);
		$criteria->compare('photo',$this->photo,true);
		$criteria->compare('body',$this->body,true);
		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}

    public function beforeValidate()
    {
        $this->publish_date = strtotime( $this->publish_date . ' ' . $this->publish_time );
        return parent::beforeValidate();
    }

    public function beforeSave()
    {
        // code...
        $now = time();

        if( $this->isNewRecord )
        {
            $this->created = $now;
        }

        $this->updated = $now;

        return parent::beforeSave();
    }

    /**
     * since the Blorgh Types are defined in the configuration file
     * we have to handle these differently
     */
    public function getBlorghTypes()
    {
        if( isset( Yii::app()->params['blorgh_types'] ) )
        {
            $types = Yii::app()->params['blorgh_types'];

            if( is_array( $types ) )
            {
                $keys = array_keys( $types );

                for( $i=0; $i<sizeof($keys); $i++ )
                {
                    $retval[$keys[$i]] = $keys[$i];
                }

                return $retval;
            }
        }
        else
        {
            throw new CHttpException( 500, 'Missing Blorgh Types, please read the documentation' );
        }
    }
}
