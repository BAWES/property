<?php
/* @var $this ClientController */
/* @var $model Client */

$this->breadcrumbs=array(
	'Clients'=>array('index'),
	$model->client_name=>array('view','id'=>$model->client_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Clients', 'url'=>array('index')),
	array('label'=>'Create Client', 'url'=>array('create')),
	array('label'=>'View Client', 'url'=>array('view', 'id'=>$model->client_id)),
);
?>

<h1>Update Client <?php echo $model->client_name; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>