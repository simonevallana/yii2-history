<?php

namespace boolean\history;

use Yii;
use yii\db\BaseActiveRecord;

/**
 * This is the model class for table "history".
 *
 * @property integer $id
 * @property string $initiator
 * @property string $ip
 * @property string $event
 * @property string $class
 * @property string $table_name
 * @property string $row_id
 * @property string $log
 * @property integer $created_at
 * @property integer $updated_at
 */
class HistoryEntity extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return '{{%history}}';
    }

    public static function getEventsList()
    {
        return [
            BaseActiveRecord::EVENT_AFTER_INSERT => BaseActiveRecord::EVENT_AFTER_INSERT,
            BaseActiveRecord::EVENT_AFTER_UPDATE => BaseActiveRecord::EVENT_AFTER_UPDATE,
            BaseActiveRecord::EVENT_AFTER_DELETE => BaseActiveRecord::EVENT_AFTER_DELETE,
        ];
    }

//    public function attributeLabels()
//    {
//        return [
//            'id' => Yii::t('app', 'ID'),
//            'initiator' => Yii::t('app', 'Initiator'),
//            'event' => Yii::t('app', 'Event'),
//            'model' => Yii::t('app', 'Model'),
//            'log' => Yii::t('app', 'Log'),
//            'created_at' => Yii::t('app', 'Created At'),
//            'updated_at' => Yii::t('app', 'Updated At'),
//            'status' => Yii::t('app', 'Status'),
//        ];
//    }
}
