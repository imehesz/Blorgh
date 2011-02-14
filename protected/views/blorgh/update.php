<?php
$this->breadcrumbs=array(
	'Blorghs'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Blorgh', 'url'=>array('index')),
	array('label'=>'Create Blorgh', 'url'=>array('create')),
	array('label'=>'View Blorgh', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Blorgh', 'url'=>array('admin')),
);
?>

<h1>Update Blorgh <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>