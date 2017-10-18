<?php
/**
 * Created by PhpStorm.
 * User: Genjo
 * Date: 18.10.2017
 * Time: 19:35
 */

namespace app\models;


use yii\db\ActiveRecord;

class Cart extends ActiveRecord
{

    public function addToCart($product,$qty=1)
    {
      if (isset($_SESSION['cart'][$product->id]['qty']))
      {
          $_SESSION['cart'][$product->id]['qty'] += $qty;
      }
      else
          {
            $_SESSION['cart'][$product->id] = [

                'qty' => $qty,
                'name' => $product->name,
                'price' => $product->price,
                'img' => $product->img,
            ];
          }
       $_SESSION['cart.qty'] = isset( $_SESSION['cart.qty'])  ?  $_SESSION['cart.qty'] + $qty : $qty;
       $_SESSION['cart.sum'] = isset( $_SESSION['cart.sum']) ?  $_SESSION['cart.sum'] + $qty*$product->price : $product->price * $qty;
    }

}