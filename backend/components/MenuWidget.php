<?php
namespace backend\components;
use yii\base\Widget;
use backend\models\Categories;

class MenuWidget extends Widget {
    public $tpl;
    public $data;
    public $tree;
    public $menuHtml;
    
    
    public function init() {
        parent::init();
        if($this->tpl===null){
            $this->tpl='menu';
            
        }
        
        $this->tpl .='.php';
    }
    
    public function run() {
        $this->data= Categories::find()->indexBy('category_id')->asArray()->all();
        debug($this->data);
        return $this->tpl;
    }
    
    
    protected function getTree() {
        $tree=[];
        foreach ($this->data as $id=>&$node){
            if(!$node['parent_id'])
                $tree[$id]=&$node;
            else {
                
                $this->data[$node['parent_id']]['childs'][$node['category_id']]=&$node;
                
            }
            return $tree;
        }
    }
}

