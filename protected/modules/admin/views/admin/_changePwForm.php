<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'admin-form',
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'admin_password'); ?>
		<?php echo $form->textField($model,'admin_password',array('size'=>50,'maxlength'=>50,'value'=>'')); ?>
		<?php echo $form->error($model,'admin_password'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Change Password'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->