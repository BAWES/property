<?php
/* @var $this AgentController */
/* @var $model Agent */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'agent_id'); ?>
		<?php echo $form->textField($model,'agent_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'agent_name'); ?>
		<?php echo $form->textField($model,'agent_name',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'agent_email'); ?>
		<?php echo $form->textField($model,'agent_email',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->