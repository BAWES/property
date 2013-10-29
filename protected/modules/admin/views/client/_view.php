<?php
/* @var $this ClientController */
/* @var $data Client */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('client_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->client_id), array('view', 'id'=>$data->client_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('client_name')); ?>:</b>
	<?php echo CHtml::encode($data->client_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('client_email')); ?>:</b>
	<?php echo CHtml::encode($data->client_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('client_password')); ?>:</b>
	<?php echo CHtml::encode($data->client_password); ?>
	<br />


</div>