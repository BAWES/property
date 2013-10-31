<?php
/* @var $this TenantController */
/* @var $model Tenant */

$this->breadcrumbs=array(
	'Tenants'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Create Tenant', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tenant-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Tenants</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tenant-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'tenant_id',
		'tenant_name',
		'tenant_email',
            /*
		'tenant_password',
		'tenant_civil_id',
		'tenant_marital_status',
		'tenant_number_ppl',
		'tenant_passport_num',
		'tenant_employer_detail',
		'tenant_phone1',
		'tenant_phone2',
		'tenant_phone3',
		'tenant_phone4',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
