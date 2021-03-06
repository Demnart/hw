<?php
namespace app\components;
use app\models\Category;
use yii\base\Widget;


class MenuWidget
extends Widget
{
    public $tpl;
    public $data;
    public $tree;
    public $html;


    public function init()
    {
        parent::init();
        if ($this->tpl == null)
        {
            $this->tpl = 'menu';
        }
        $this->tpl .= '.php';
    }

    public function run()
    {
        $menu = \Yii::$app->cache->get('menu');
        if ($menu)
        {
            return $menu;
        }
        $this->data = Category::find()->asArray()->indexBy('id')->all();
        $this->tree = $this->getTree();
        $this->html= $this->getMenuHtml($this->tree);
        \Yii::$app->cache->set('menu',$this->html,120);
        return $this->html;
    }

    protected function getTree(){
        $tree = [];
        foreach ($this->data as $id=>&$node) {
            if (!$node['parent_id'])
                $tree[$id] = &$node;
            else
                $this->data[$node['parent_id']]['childs'][$node['id']] = &$node;
        }
        return $tree;
    }

    protected function getMenuHtml($tree){
        $str = '';
        foreach ($tree as $category) {
            $str .= $this->catToTemplate($category);
        }
        return $str;
    }

    protected function catToTemplate($category){
        ob_start();
        include __DIR__ . '/menu_tpl/' . $this->tpl;
        return ob_get_clean();
    }
}