<?php
/**
 * 
 **/
class BlorghConfig
{
    public static function checkBlorghSettings( $event )
    {
        if( isset( Yii::app()->params['blorgh_types'] ) )
        {
            // settings for other parts of the site (ie: imagecache )
        }
        else
        {
            throw new CHttpException( 500, 'Oops, missing Blorgh Types, please read the documentation' );
        }
    }
}
?>
