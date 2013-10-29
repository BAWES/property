<?php
$this->breadcrumbs=array(
	'Admins'=>array('index'),
	$model->admin_name=>array('view','id'=>$model->admin_id),
	'Change Password',
);

$this->menu=array(
	array('label'=>'Manage Admins', 'url'=>array('index')),
	array('label'=>'Create Admin', 'url'=>array('create')),
	array('label'=>'View Admin', 'url'=>array('view', 'id'=>$model->admin_id)),
);
?>

<h1>Change Password for <?php echo $model->admin_name; ?></h1>

<?php echo $this->renderPartial('_changePwForm', array('model'=>$model)); ?>