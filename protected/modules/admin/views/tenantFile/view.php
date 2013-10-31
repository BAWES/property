<?php
/* @var $this TenantFileController */
/* @var $model TenantFile */

$this->breadcrumbs=array(
	'Tenant Files'=>array('index'),
	$model->file_id,
);

$this->menu=array(
	array('label'=>'List TenantFile', 'url'=>array('index')),
	array('label'=>'Create TenantFile', 'url'=>array('create')),
	array('label'=>'Update TenantFile', 'url'=>array('update', 'id'=>$model->file_id)),
	array('label'=>'Delete TenantFile', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->file_id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View TenantFile #<?php echo $model->file_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'file_id',
		'tenant_id',
		'file_name',
		'file_desc',
	),
)); ?>
