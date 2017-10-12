<?php
/**
 * Created by PhpStorm.
 * User: genjo
 * Date: 11.10.17
 * Time: 11:25
 */

namespace app\controllers;


use yii\web\Controller;

class AppController extends Controller
{

    public function setMeta($title,$keywords = null,$description=null)
    {
        $this->view->title = $title;
        $this->view->registerMetaTag(['name'=>'keywords','content'=>$keywords]);
        $this->view->registerMetaTag(['name'=>'description','content'=>$description]);
    }
}