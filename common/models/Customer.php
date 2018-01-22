<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property int $id
 * @property string $firstName
 * @property string $lastName
 * @property int $streetNumber
 * @property string $streetName
 * @property int $postalCode
 * @property string $province
 * @property string $country
 * @property int $phoneNumber
 *
 * @property Order[] $orders
 */
class Customer extends \yii\db\ActiveRecord
{
    const STATUS_SALE_ACTIVE = 1;
    const STATUS_SALE_DELETED = 0;
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
            [['firstName', 'lastName'], 'required'],
            [['streetNumber', 'postalCode', 'phoneNumber'], 'integer'],
            [['firstName'], 'string', 'max' => 30],
            [['lastName'], 'string', 'max' => 50,'min' => 3],
            [['streetName', 'province', 'country'], 'string', 'max' => 255,'min' => 4],
            ['status', 'default', 'value' => self::STATUS_SALE_DELETED],
            ['status', 'in', 'range' => [self::STATUS_SALE_ACTIVE, self::STATUS_SALE_DELETED]],
            ['postalCode','match','pattern' => '/[0-9]{5}'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstName' => 'First Name',
            'lastName' => 'Last Name',
            'streetNumber' => 'Street Number',
            'streetName' => 'Street Name',
            'postalCode' => 'Postal Code',
            'province' => 'Province',
            'country' => 'Country',
            'phoneNumber' => 'Phone Number',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    public function getUser(){

        return $this->hasOne(User::className(),['id' => 'user_id']);
    }
    public function getOrders(){

        return $this->hasMany(Order::className(),['customer_id' => 'id']);
    }

    public function getOrderItem(){

        return $this->hasMany(Order_item::className(),['customer_id' => 'id']);
    }

    public function fields()
    {
        $fields =  parent::fields();

        $fields[] = 'orders';
        $fields[] = 'orderItem';
        return $fields;
    }
}
