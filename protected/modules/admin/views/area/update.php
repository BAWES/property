<?php
/* @var $this AreaController */
/* @var $model Area */

$this->breadcrumbs=array(
	'Areas'=>array('index'),
	$model->area_name=>array('view','id'=>$model->area_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Areas', 'url'=>array('index')),
	array('label'=>'Create Area', 'url'=>array('create')),
	array('label'=>'View Area', 'url'=>array('view', 'id'=>$model->area_id)),
);
?>

<h1>Update Area <?php echo $model->area_name; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>