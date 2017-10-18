<?php
/**
 * Created by PhpStorm.
 * User: Genjo
 * Date: 18.10.2017
 * Time: 19:28
 */

namespace app\controllers;


class CartController extends AppController
{

    public function actionAdd()
    {
        $id = \Yii::$app->request->get('id');
        debug($id);
    }
}