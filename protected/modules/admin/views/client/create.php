<?php
/* @var $this ClientController */
/* @var $model Client */

$this->breadcrumbs=array(
	'Clients'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Clients', 'url'=>array('index')),
);
?>

<h1>Create Client</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>