<?php
$this->breadcrumbs=array(
	'Blorghs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Blorgh', 'url'=>array('index')),
	array('label'=>'Manage Blorgh', 'url'=>array('admin')),
);
?>

<h1>Create Blorgh</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>