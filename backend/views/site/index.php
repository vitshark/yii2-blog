<?php

/* @var $this yii\web\View */
use yii\helpers\Url;

$this->title = Yii::$app->name;
?>

        <div class="row center-block text-center center">
    
        <div class="col-lg-3 col-md-4 col-xs-6">
            <a class="btn btn-default btn-square-200px"
               href="<?php echo Url::toRoute('/settings/index'); ?>">
                <i class="fa fa-gears fa-10x text-info">
                </i>
                <br/>
                <h4>Настройки сайта</h4>
            </a>
        </div>
    
    
        <div class="col-lg-3 col-md-4 col-xs-6">
            <a class="btn btn-default btn-square-200px"
               href="<?php echo Url::toRoute('/categories/index'); ?>">
                <i class="fa fa-folder fa-10x text-info">
                </i>
                <br/>
                <h4>Категории статей</h4>
            </a>
        </div>
    
        <div class="col-lg-3 col-md-4 col-xs-6">
            <a class="btn btn-default btn-square-200px"
               href="<?php echo Url::toRoute('/posts/index'); ?>">
                <i class="fa fa-file-text fa-10x text-info">
                </i>
                <br/>
                <h4>Список статей сайта</h4>
            </a>
        </div>
    
        <div class="col-lg-3 col-md-4 col-xs-6">
            <a class="btn btn-default btn-square-200px"
               href="<?php echo Url::toRoute('/admin/index'); ?>">
                <i class="fa fa-money fa-10x text-danger">
                </i>
                <br/>
                <h4>Free cells</h4>
            </a>
        </div>
    
        <div class="col-lg-3 col-md-4 col-xs-6">
            <a class="btn btn-default btn-square-200px"
               href="<?php echo Url::toRoute('/admin/index'); ?>">
                <i class="fa fa-calendar fa-10x text-info">
                </i>
                <br/>
                <h4>free cells</h4>
            </a>
        </div>
    
        <div class="col-lg-3 col-md-4 col-xs-6">
            <a class="btn btn-default btn-square-200px"
               href="<?php echo Url::toRoute('/admin/index'); ?>">
                <i class="fa fa-close fa-10x text-danger">
                </i>
                <br/>
                <h4>Free cells</h4>
            </a>
        </div>
    
        <div class="col-lg-3 col-md-4 col-xs-6 center-block">
            <a class="btn btn-default btn-square-200px"
               href="<?php echo Url::toRoute('/admin/index'); ?>">
                <i class="fa fa-bar-chart fa-10x text-info">
                </i>
                <br/>
                <h4>Free cells</h4>
            </a>
        </div>
    

        
    </div>

