<?php

namespace backend\models;

use Yii;
use yii\base\Model;

/**
 * This is the model class for table "{{%contacts}}".
 *
 * @property int $id
 * @property string $email
 * @property string $Name
 * @property string $Subject
 * @property string $Message
 * @property int $status
 * @property string $Date
 */
class Contacts extends Model
{
    /**
     * {@inheritdoc}
     */

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
        ];
    }
    public function k_to_c($temp)
    {
        if (!is_numeric($temp)) {
            return false;
        }
        return round(($temp - 273.15));
    }
    /**
     * {@inheritdoc}
     * @return \backend\models\query\ContactsQuery the active query used by this AR class.
     */
}
