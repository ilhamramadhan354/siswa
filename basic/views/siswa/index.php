<?php
use yii\helpers\Html;
use yii\grid\GridView;
use dosamigos\datepicker\DatePicker;
use yii\widgets\LinkPager;




$this->title = 'Daftar Siswa';
$this->params['breadcrumbs'][]= $this->title;
?>
<div class="siswa-index">
	 <div class="panel panel-primary">
      <div class="panel-heading">
      	<h3 class="panel-title">

    <i class="glyphicon glyphicon-list-alt"> </i> <?= Html::encode($this->title) ?></h3></div>
        <div class="panel-body">
    
	
	<?php ?>

	
		<?= Html::a('Create Siswa',['create'], ['class' => 'btn btn btn-success']) ?>
		
	

	<?= GridView::widget([
		'dataProvider' => $dataProvider,

		'filterModel' => $searchModel,

		'columns' => [
			['class' => 'yii\grid\SerialColumn'],
			'nisn',
			'nama_siswa',
			'tempat_lahir',
			      [
                'attribute'=> 'tgl_lahir',
                'value'=>'tgl_lahir',
                'format'=>'raw',
                'filter'=>DatePicker::widget([
                'model' => $searchModel,
                'attribute' => 'tgl_lahir',
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd',
                    ]
                    
                ])

            ],          

    

    

			'alamat:ntext',
			['class' => 'yii\grid\ActionColumn'],
		 
		],
	]);?>
	<?= LinkPager::widget(['pagination' => $pagination]) 
?>
</div>