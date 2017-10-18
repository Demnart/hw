<?php
/**
 * Created by PhpStorm.
 * User: genjo
 * Date: 17.10.17
 * Time: 10:19
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

    public function actionDeleteAll()
    {
        $session= \Yii::$app->session;
        $session->open();
        $session->remove('cart');
        $session->remove('cart.qty');
        $session->remove('cart.sum');
        $this->layout=false;
        $this->render('cart-modal',compact($session));
    }

}