<?php
    $this->menu=array(
	array('label'=>'List Blorgh', 'url'=>array('list')),
	array('label'=>'Create Blorgh', 'url'=>array('create')),
	array('label'=>'Manage Blorgh', 'url'=>array('admin')),
	array('label'=>'Logout', 'url'=> $this->createUrl( 'site/logout' ) ),
);
?>

<h1>Blorghs</h1>

<?php 
    $this->widget( 'ext.yiinfinite-scroll.YiinfiniteScroller', array(
        'itemSelector'  => 'div.blorgh',
        'pages'         => $pages,
    ) );

    foreach ($blorghs as $blorgh) 
    {
        $this->renderPartial( '_view', array( 'data' => $blorgh ) );
    }
?>

<div style="clear:both;"></div>
