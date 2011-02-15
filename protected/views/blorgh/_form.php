<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'blorgh-form',
	'enableAjaxValidation'=>false,
    'htmlOptions'   => array( 'enctype' => 'multipart/form-data' )
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'category'); ?>
		<?php echo $form->textField($model,'category',array('size'=>20,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'category'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->dropDownList($model,'type', $model->getBlorghTypes() ); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'photo'); ?>
		<?php echo $form->fileField($model,'photo',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'photo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'teaser'); ?>
		<?php echo $form->textArea($model,'teaser',array('rows'=>2, 'cols'=>50)); ?>
		<?php echo $form->error($model,'teaser'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'body'); ?>
		<?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'body'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'publish_date'); ?>
        <?php 
            $this->widget(
                'zii.widgets.jui.CJuiDatePicker', 
                array(
                    'name'=>'Blorgh[publish_date]', 
                    'htmlOptions' => array( 
                        'size' => 10, 
                    ),
                    'value' => ($model->isNewRecord ? date( 'm/d/Y', time() ) : date( 'm/d/Y', $model->publish_date ) ) 
                )
            ); 
        ?>
		<?php echo $form->textField($model,'publish_time', array( 'value' => ($model->isNewRecord ? '08:00' : date( 'H:i', $model->publish_date ) ), 'size' => 6 ) ); ?>
        <div class="hint">Please use military time, ie: 23:30</div>
		<?php echo $form->error($model,'publish_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model,'status',array( Blorgh::NOTPUBLISHED => 'Not Published' ,Blorgh::PUBLISHED => 'Published',Blorgh::ARCHIVED => 'Archived') ); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
