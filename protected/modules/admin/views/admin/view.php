<?php
$this->breadcrumbs=array(
	'Admins'=>array('index'),
	$model->admin_name,
);

$this->menu=array(
	array('label'=>'Manage Admins', 'url'=>array('index')),
	array('label'=>'Create Admin', 'url'=>array('create')),
	array('label'=>'Update Admin', 'url'=>array('update', 'id'=>$model->admin_id)),
	array('label'=>'Change Password', 'url'=>array('changePassword', 'id'=>$model->admin_id)),
	array('label'=>'Delete Admin', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->admin_id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1><?php echo $model->admin_name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'admin_id',
		'admin_name',
		'admin_email',
	),
)); ?>
