<?php
/* @var $this TenantFileController */
/* @var $model TenantFile */

$this->breadcrumbs=array(
	'Tenant Files'=>array('index'),
	$model->file_id=>array('view','id'=>$model->file_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TenantFiles', 'url'=>array('index')),
	array('label'=>'Create TenantFile', 'url'=>array('create')),
	array('label'=>'View TenantFile', 'url'=>array('view', 'id'=>$model->file_id)),
);
?>

<h1>Update TenantFile <?php echo $model->file_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>