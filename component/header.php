<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php THI::initTheme($this); ?>
<?php if(!THI::isPjax()):?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="HandheldFriendly" content="True" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="theme-color" content="#00BCD4" />
    <link rel="dns-prefetch" href="//static.misaka.xin">
    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>

    <!-- 使用url函数转换相关路径 -->
    <link rel="stylesheet" href="<?php $this->options->themeUrl('assets/css/style.css'); ?>">
    <script>
        window['LocalConst'] = {
            SITE_NAME: '<?php $this->options->title(); ?>',
            SITE_URL: '<?php $this->options->siteUrl(); ?>',
            ASSETS_URL: '<?php $this->options->themeUrl('assets/'); ?>',
            COMMENT_SYSTEM: 0,
            COMMENT_SYSTEM_DISQUS: 1,
            COMMENT_SYSTEM_CHANGYAN: 2,
            COMMENT_SYSTEM_EMBED: <?php echo $this->options->useComment ?>,
            DISQUS_SHORT_NAME: '<?php if (isset($this->options->disqusShortName)) echo $this->options->disqusShortName ?>',
            CHANGYAN_APPID: '<?php if (isset($this->options->changyanAPPID)) echo $this->options->changyanAPPID ?>',
            CHANGYAN_APPKEY: '<?php if (isset($this->options->changyanAPPKEY)) echo $this->options->changyanAPPKEY ?>',
            GOOGLEANALYTICS_ID: '<?php if (isset($this->options->GoogleAnalytics)) echo $this->options->GoogleAnalytics ?>'
        };
    </script>

    <!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header(); ?>
</head>
<body>
    <div id="loading-view">
        <div class="loader">
            <div class="loader1"></div>
            <div class="loader2"></div>
            <div class="loader3"></div>
            <div class="loader4"></div>
            <div class="loader5"></div>
        </div>
        <div class="loader-text noselect">Loading...</div>
    </div>

    <div class="page-wrap">
        <header class="siteHeader top noselect" id="site-header" role="banner">
            <div class="grid">
                <a class="siteName" href="<?php $this->options->siteUrl(); ?>" id="site-header_logo">
                    <span class="high">J</span>
                    <span class="high">C</span>
                    <span class="high">L</span>
                    <span>の</span>
                    <span>日</span>
                    <span>常</span>
                </a>    
                <div class="siteNavBotton">
                    <div class="siteMenuBotton">
                        <a class="siteMenuBottonToggle" id="menu">
                            <i class="material-icons">menu</i>
                        </a>
                    </div>
                </div>
            </div>
        </header>
        <?php $this->need('component/menu.php'); ?>
        <div class="pjax-container">
<?php endif;?>