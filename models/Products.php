<?php
/**
 * Created by PhpStorm.
 * User: genjo
 * Date: 11.10.17
 * Time: 10:37
 */

namespace app\models;


use yii\db\ActiveRecord;

class Products extends ActiveRecord
{

    public static function tableName()
    {
        return 'product' ;
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(),['id' => 'category_id']);
    }

}