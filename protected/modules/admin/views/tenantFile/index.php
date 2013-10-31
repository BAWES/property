<?php
/* @var $this TenantFileController */
/* @var $model TenantFile */

$this->breadcrumbs=array(
	'Tenant Files'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Create TenantFile', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tenant-file-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Tenant Files</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tenant-file-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'file_id',
		'tenant_id',
		'file_name',
		'file_desc',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
