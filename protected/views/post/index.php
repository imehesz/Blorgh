<?php
$this->breadcrumbs=array(
	'Posts',
);

$this->menu=array(
	array('label'=>'Create Post', 'url'=>array('create')),
	array('label'=>'Manage Post', 'url'=>array('admin')),
);
?>

<h1>Posts</h1>

<?php 
    $this->widget( 'ext.yiinfinite-scroll.YiinfiniteScroller', array(
        'itemSelector'  => 'div.post',
        'pages'         => $pages,
    ) );

    foreach ($posts as $post) 
    {
        $this->renderPartial( '_view', array( 'data' => $post ) );
    }
    /*
    $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 
    */
?>
