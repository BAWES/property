<?php
/* @var $this AreaController */
/* @var $model Area */

$this->breadcrumbs=array(
	'Areas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Areas', 'url'=>array('index')),
);
?>

<h1>Create Area</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>