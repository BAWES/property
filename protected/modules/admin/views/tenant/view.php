<?php
/* @var $this TenantController */
/* @var $model Tenant */

$this->breadcrumbs = array(
    'Tenants' => array('index'),
    $model->tenant_name,
);

$this->menu = array(
    array('label' => 'List Tenants', 'url' => array('index')),
    array('label' => 'Create Tenant', 'url' => array('create')),
    array('label' => 'Update Tenant', 'url' => array('update', 'id' => $model->tenant_id)),
    array('label' => 'Delete Tenant', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->tenant_id), 'confirm' => 'Are you sure you want to delete this item?')),
);
?>

<h1>View Tenant <?php echo $model->tenant_name; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'tenant_id',
        'tenant_name',
        'tenant_email',
        //'tenant_password',
        array(// related city displayed as a link
            'label' => 'Password',
            'type' => 'raw',
            'value' => "***",
        ),
        'tenant_civil_id',
        'tenant_marital_status',
        'tenant_number_ppl',
        'tenant_passport_num',
        'tenant_employer_detail',
        'tenant_phone1',
        'tenant_phone2',
        'tenant_phone3',
        'tenant_phone4',
    ),
));
?>
