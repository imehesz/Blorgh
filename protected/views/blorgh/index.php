<?php
$this->breadcrumbs=array(
	'Blorghs',
);

$this->menu=array(
	array('label'=>'Create Blorgh', 'url'=>array('create')),
	array('label'=>'Manage Blorgh', 'url'=>array('admin')),
);
?>

<h1>Blorghs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
