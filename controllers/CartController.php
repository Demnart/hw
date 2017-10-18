<?php
/**
 * Created by PhpStorm.
 * User: Genjo
 * Date: 18.10.2017
 * Time: 19:28
 */

namespace app\controllers;
use app\models\Cart;

use app\models\Products;

class CartController extends AppController
{

    public function actionAdd()
    {
        $id = \Yii::$app->request->get('id');
        $product = Products::findOne($id);
        $session = \Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->addToCart($product);
        $this->layout=false;
        return $this->render('cart-modal',compact('session'));
    }
}