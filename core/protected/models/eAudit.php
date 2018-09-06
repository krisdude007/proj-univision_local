<?php

class eAudit extends Audit {

    public $username;
    public $action;

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('action', 'required', 'on' => 'insert, update'),
            array('user_id', 'numerical', 'integerOnly' => true),
            array('user_id', 'default', 'value' => Yii::app()->user->getId()),
            array('created_on,updated_on', 'default', 'value' => date("Y-m-d H:i:s"), 'setOnEmpty' => false, 'on' => 'insert'),
            array('updated_on', 'default', 'value' => date("Y-m-d H:i:s"), 'setOnEmpty' => false, 'on' => 'update'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('username, action, id, user_id, action, created_on, updated_on', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'user' => array(self::BELONGS_TO, 'eUser', 'user_id'),
        );
    }

    public function limit($limit = 5) {
        $this->getDbCriteria()->mergeWith(array(
            'order' => 't.created_on DESC',
            'limit' => $limit,
        ));
        return $this;
    }

    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.
        $criteria = new CDbCriteria;
        $criteria->with = array('user');
        $criteria->together = true;
        $criteria->compare('user.username', $this->username, true);
        $criteria->compare('t.created_on', $this->created_on!==null?gmdate('Y-m-d H:i:s',strtotime($this->created_on)):null);
        $criteria->order = 't.created_on DESC';
        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => Yii::app()->params['perPage'],
            ),
        ));
    }

}

