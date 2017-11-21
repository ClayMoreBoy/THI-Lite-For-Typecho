<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

class THI {
    public static $version = "2.0.0";
    
    public static $options = [];
    
    public static function initTheme (Widget_Archive $archive) {
        
    }
    
    public static function isPjax () {
        return array_key_exists ('HTTP_X_PJAX', $_SERVER) && $_SERVER['HTTP_X_PJAX'];
    }

    public static function randomBanner ($banners) {
        $root = rtrim(Helper::options()->themeUrl, '/') . '/';
        if (empty($banners)) {
            $banner = $root . 'assets/image/1.png';
        } else {
            $banners = mb_split("\n", $banners);
            $banner = $banners[rand(0, count($banners) - 1)];
            $banner = trim($banner);
        }
        return $banner;
    }
    
}
