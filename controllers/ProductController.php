<?php
/**
 * Created by PhpStorm.
 * User: genjo
 * Date: 17.10.17
 * Time: 8:21
 */

namespace app\controllers;


use app\models\Products;
use yii\web\HttpException;

class ProductController extends AppController
{

    public function actionView()
    {
        $id= \Yii::$app->request->get('id');
        $product = Products::findOne($id);
        if (!$product)
        {
            throw new HttpException(404,'Такой страницы не найдено');
        }

        $hits = Products::find()->where(['hit'=>'1'])->limit(6)->all();
        $this->setMeta('E-SHOPPER | '.$product->name,$product->keywords,$product->description);
        return $this->render('view',compact('product','hits'));
    }
}