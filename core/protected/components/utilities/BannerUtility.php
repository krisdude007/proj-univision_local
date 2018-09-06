<?php
class BannerUtility{
    public static function getBanners(){
        $banners = glob(Yii::app()->params['paths']['image'] . '/' . Yii::app()->params['custom_params']['banner_prefix'] . "_banner[0-9]*" . "." . Yii::app()->params['custom_params']['banner_extension']);
        $bannerImages = array();
        foreach ($banners as $banner) {
            $imagePaths = explode('/', $banner);
            $imageFile = $imagePaths[count($imagePaths) - 1];
            $index = preg_replace("/[^0-9]/", "", $imageFile); //get numbers from file name.
            $bannerImages[$index] = $imageFile;
        }
        return $bannerImages;
    }
}
?>
