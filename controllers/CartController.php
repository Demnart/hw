<?php
/**
 * Created by PhpStorm.
 * User: genjo
 * Date: 17.10.17
 * Time: 10:19
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