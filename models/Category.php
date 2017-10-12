<?php
/**
 * Created by PhpStorm.
 * User: genjo
 * Date: 11.10.17
 * Time: 10:37
 */

namespace app\models;


use yii\db\ActiveRecord;

class Category extends ActiveRecord
{

    public static function tableName()
    {
        return 'category';
    }

    public function getProducts()
    {
        return $this->hasMany(Products::className(),['category_id'=>'id']);
    }
}