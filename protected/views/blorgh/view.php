<?php
$this->breadcrumbs=array(
	'Blorghs'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Blorgh', 'url'=>array('index')),
	array('label'=>'Create Blorgh', 'url'=>array('create')),
	array('label'=>'Update Blorgh', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Blorgh', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Blorgh', 'url'=>array('admin')),
);
?>

<h1>View Blorgh #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'category',
		'teaser',
		'status',
		'type',
		'updated',
		'created',
		'photo',
		'body',
		'id',
		'title',
        'publish_date',
	),
)); ?>
