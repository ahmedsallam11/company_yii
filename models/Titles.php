<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "titles".
 *
 * @property integer $titleID
 * @property string $titleName
 */
class Titles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'titles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['titleID'], 'required'],
            [['titleID'], 'integer'],
            [['titleName'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'titleID' => Yii::t('app', 'Title ID'),
            'titleName' => Yii::t('app', 'Title Name'),
        ];
    }
}
