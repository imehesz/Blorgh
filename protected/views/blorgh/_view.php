<?php $class = $data->type; ?>
<div class="blorgh <?php echo $class; ?>">
    <div class="title"><?php echo strtoupper($data->title); ?></div>
    <div class="category"><?php echo Time::timeAgoInWords( date( 'm/d/Y H:i:s', $data->publish_date) ); ?><br /><a href=""><?php echo $data->category ; ?></a></div>
    <div class="teaser"><?php echo $data->teaser; ?></div>
</div>
