<?php
/**
 * Created by PhpStorm.
 * User: genjo
 * Date: 17.10.17
 * Time: 9:40
 */

namespace app\controllers;


class ErrorController extends AppController
{
    public function actionError()
    {
        $this->layout = 'error';
        return $this->render('error');
    }

}