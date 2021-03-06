<?php
/**
 * Created by PhpStorm.
 * User: genjo
 * Date: 11.10.17
 * Time: 11:25
 */

namespace app\controllers;


use app\models\Category;
use app\models\Products;
use yii\data\Pagination;
use yii\web\HttpException;

class CategoryController extends AppController
{

    public function actionIndex()
    {
        $hits = Products::find()->where(['hit'=>'1'])->limit(6)->all();
        $this->setMeta('E-SHOPPER');
        return $this->render('index',compact('hits'));
    }

    public function actionView()
    {
        $id = \Yii::$app->request->get('id');
        $category = Category::findOne($id);
        if (!$category)
        {
            throw new HttpException(404,'Такой категории не существует');
        }
        $query = Products::find()->where(['category_id' => $id]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize'=>3,'forcePageParam'=>false,'pageSizeParam'=>false]);
        $products = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        $this->setMeta('E-SHOPPER | '. $category->name,$category->keywords,$category->description);
        return $this->render('view',compact('products','pages','category'));

    }

    public function actionSearch()
    {
        $name = trim(\Yii::$app->request->get('search'));
        $query = Products::find()->where(['like' ,'name', $name]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize'=>3,'forcePageParam'=>false,'pageSizeParam'=>false]);
        $products = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        $this->setMeta('E-SHOPPER | ' . $name);
        return $this->render('search',compact('products','pages','name'));
    }
}