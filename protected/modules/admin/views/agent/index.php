<?php
/* @var $this AgentController */
/* @var $model Agent */

$this->breadcrumbs=array(
	'Agents'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Create Agent', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#agent-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Agents</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'agent-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'agent_id',
		'agent_name',
		'agent_email',
		//'agent_password',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
