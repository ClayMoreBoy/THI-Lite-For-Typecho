<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

require_once('lib/THI.php');
require_once('lib/Content.php');
require_once("lib/Const.php");
require_once("lib/Welcome.php");

function themeConfig($form)
{    
    $useComment = new Typecho_Widget_Helper_Form_Element_Select('useComment', array('0'=>_t('自带'), '1'=>_t('Disqus'), '2'=>_t('畅言')), '0', _t('评论'));
    $form->addInput($useComment);
    
    $disqusShortName = new Typecho_Widget_Helper_Form_Element_Text('disqusShortName', NULL, NULL, _t('Disqus Short Name'));
    $disqusShortName->input->setAttribute('class', 'mini');
    $form->addInput($disqusShortName);
    
    $changyanAPPID = new Typecho_Widget_Helper_Form_Element_Text('changyanAPPID', NULL, NULL, _t('畅言 AppID'));
    $changyanAPPID->input->setAttribute('class', 'mini');
    $form->addInput($changyanAPPID);
    
    $changyanAPPKEY = new Typecho_Widget_Helper_Form_Element_Text('changyanAPPKEY', NULL, NULL, _t('畅言AppKey'));
    $changyanAPPKEY->input->setAttribute('class', 'mini');
    $form->addInput($changyanAPPKEY);
    
    $SignBlogTitle = new Typecho_Widget_Helper_Form_Element_Text('SignBlogTitle', NULL, NULL, _t('Title 要高亮的部分'));
    $form->addInput($SignBlogTitle);
    
    $GoogleAnalytics = new Typecho_Widget_Helper_Form_Element_Text('GoogleAnalytics', NULL, NULL, _t('Google 统计代码'));
    $GoogleAnalytics->input->setAttribute('class', 'mini');
    $form->addInput($GoogleAnalytics);
    
	$banner = new Typecho_Widget_Helper_Form_Element_Textarea('banner', NULL, NULL, _t('Banner'), _t('输入图片URL，如有多个则一行一个，随机选择展示。'));
    $form->addInput($banner);
    
    $footerOutPut = new Typecho_Widget_Helper_Form_Element_Textarea('footerOutPut', NULL, NULL, _t('在 Footer 中输出代码'), _t(''));
    $form->addInput($footerOutPut);
}

/*
 * @params Widget_Archive $archive
 */
function themeInit($archive){
    // 判断是否为文章或页面
    if($archive->is('single')){
        Content::viewCounter($archive);
    }
}

function themeFields($layout) {
    $thumb = new Typecho_Widget_Helper_Form_Element_Textarea('thumb', NULL, NULL, _t('thumb'), _t('输入图片URL，如有多个则一行一个，随机选择展示。'));
    $layout->addItem($thumb);
    
    $viewsNum = new Typecho_Widget_Helper_Form_Element_Text('viewsNum', NULL, 0, _t('文章浏览数'), _t('文章浏览数统计'));
    $layout->addItem($viewsNum);
}

function isPjax () {
    return array_key_exists ('HTTP_X_PJAX', $_SERVER) && $_SERVER['HTTP_X_PJAX'];
}
