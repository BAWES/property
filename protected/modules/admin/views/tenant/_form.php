<?php
/* @var $this TenantController */
/* @var $model Tenant */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tenant-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'tenant_name'); ?>
		<?php echo $form->textField($model,'tenant_name',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'tenant_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tenant_email'); ?>
		<?php echo $form->textField($model,'tenant_email',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'tenant_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tenant_password'); ?>
		<?php echo $form->textField($model,'tenant_password',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'tenant_password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tenant_civil_id'); ?>
		<?php echo $form->textField($model,'tenant_civil_id',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'tenant_civil_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tenant_marital_status'); ?>
		<?php echo $form->dropDownList($model,'tenant_marital_status',array('single'=>'Single','married'=>'Married')); ?>
		<?php echo $form->error($model,'tenant_marital_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tenant_number_ppl'); ?>
		<?php echo $form->textField($model,'tenant_number_ppl'); ?>
		<?php echo $form->error($model,'tenant_number_ppl'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tenant_passport_num'); ?>
		<?php echo $form->textField($model,'tenant_passport_num',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'tenant_passport_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tenant_employer_detail'); ?>
		<?php echo $form->textArea($model,'tenant_employer_detail',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'tenant_employer_detail'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tenant_phone1'); ?>
		<?php echo $form->textField($model,'tenant_phone1',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'tenant_phone1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tenant_phone2'); ?>
		<?php echo $form->textField($model,'tenant_phone2',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'tenant_phone2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tenant_phone3'); ?>
		<?php echo $form->textField($model,'tenant_phone3',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'tenant_phone3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tenant_phone4'); ?>
		<?php echo $form->textField($model,'tenant_phone4',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'tenant_phone4'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->