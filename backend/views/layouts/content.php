<?php 
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?=$this->title?>
        <small>Control panel</small>
      </h1>
      <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        
    </section>

    <!-- Main content -->
    <section class="content">
        <?= Alert::widget() ?>
      <?= $content ?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  