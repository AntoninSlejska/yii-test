<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "client".
 *
 * @property integer $clientNumber
 * @property string $clientName
 * @property string $contactLastName
 * @property string $contactFirstName
 * @property string $phone
 * @property string $addressLine1
 * @property string $addressLine2
 * @property string $city
 * @property string $state
 * @property string $postalCode
 * @property string $country
 * @property integer $salesRepEmployeeNumber
 * @property double $creditLimit
 *
 * @property Employee $salesRepEmployeeNumber0
 * @property Order[] $orders
 * @property Payment[] $payments
 */
class Client extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['clientNumber', 'clientName', 'contactLastName', 'contactFirstName', 'phone', 'addressLine1', 'city', 'country'], 'required'],
            [['clientNumber', 'salesRepEmployeeNumber'], 'integer'],
            [['creditLimit'], 'number'],
            [['clientName', 'contactLastName', 'contactFirstName', 'phone', 'addressLine1', 'addressLine2', 'city', 'state', 'country'], 'string', 'max' => 50],
            [['postalCode'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'clientNumber' => 'Client Number',
            'clientName' => 'Client Name',
            'contactLastName' => 'Contact Last Name',
            'contactFirstName' => 'Contact First Name',
            'phone' => 'Phone',
            'addressLine1' => 'Address Line1',
            'addressLine2' => 'Address Line2',
            'city' => 'City',
            'state' => 'State',
            'postalCode' => 'Postal Code',
            'country' => 'Country',
            'salesRepEmployeeNumber' => 'Sales Rep Employee Number',
            'creditLimit' => 'Credit Limit',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalesRepEmployeeNumber0()
    {
        return $this->hasOne(Employee::className(), ['employeeNumber' => 'salesRepEmployeeNumber']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['clientNumber' => 'clientNumber']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPayments()
    {
        return $this->hasMany(Payment::className(), ['clientNumber' => 'clientNumber']);
    }
}
