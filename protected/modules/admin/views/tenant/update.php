<?php
/* @var $this TenantController */
/* @var $model Tenant */

$this->breadcrumbs=array(
	'Tenants'=>array('index'),
	$model->tenant_name=>array('view','id'=>$model->tenant_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tenants', 'url'=>array('index')),
	array('label'=>'Create Tenant', 'url'=>array('create')),
	array('label'=>'View Tenant', 'url'=>array('view', 'id'=>$model->tenant_id)),
);
?>

<h1>Update Tenant <?php echo $model->tenant_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>