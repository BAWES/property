<?php
/* @var $this TenantFileController */
/* @var $model TenantFile */

$this->breadcrumbs=array(
	'Tenant Files'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TenantFile', 'url'=>array('index')),
);
?>

<h1>Create TenantFile</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>