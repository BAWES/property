<?php
/* @var $this AgentController */
/* @var $model Agent */

$this->breadcrumbs=array(
	'Agents'=>array('index'),
	$model->agent_name=>array('view','id'=>$model->agent_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Agents', 'url'=>array('index')),
	array('label'=>'Create Agent', 'url'=>array('create')),
	array('label'=>'View Agent', 'url'=>array('view', 'id'=>$model->agent_id)),
);
?>

<h1>Update Agent <?php echo $model->agent_name; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>