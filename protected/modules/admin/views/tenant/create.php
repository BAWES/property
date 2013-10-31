<?php
/* @var $this TenantController */
/* @var $model Tenant */

$this->breadcrumbs=array(
	'Tenants'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Tenants', 'url'=>array('index')),
);
?>

<h1>Create Tenant</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>