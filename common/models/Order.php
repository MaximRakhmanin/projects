<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property string $subtotal
 * @property string $shopping
 * @property int $total
 * @property int $customer_id
 *
 * @property Customer $customer
 */
class Order extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_DELETE = 0;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id','customer_id','total_amount'],'required'],
            [['total_amount', 'user_id'], 'integer'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            ['status','in','range' => [self::STATUS_ACTIVE,self::STATUS_DELETE]],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'subtotal' => 'Subtotal',
            'shopping' => 'Shopping',
            'total_amount' => 'Total amount'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id' => 'user_id']);
    }
    public function getCustomer(){

        return $this->hasOne(Customer::className(),['id' => 'customer_id']);
    }


}
