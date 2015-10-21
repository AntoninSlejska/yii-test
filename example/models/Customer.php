<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property integer $id
 * @property string $name
 * @property string $surname
 * @property string $phone_number
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'surname'], 'required'],
            [['name', 'surname', 'phone_number'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'surname' => 'Surname',
            'phone_number' => 'Phone Number',
        ];
    }

      public function getReservations()
      {
          return $this->hasMany(Reservation::className(), ['room_id' => 'id']);
      }
      public function getRooms()
      {
          return $this->hasMany(Room::className(), ['id' => 'customer_id'])->via('reservations');
      }
}
