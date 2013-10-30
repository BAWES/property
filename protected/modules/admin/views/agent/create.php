<?php
/* @var $this AgentController */
/* @var $model Agent */

$this->breadcrumbs=array(
	'Agents'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Agents', 'url'=>array('index')),
);
?>

<h1>Create Agent</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>