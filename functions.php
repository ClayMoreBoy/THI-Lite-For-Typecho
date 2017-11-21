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
    
    $GoogleAnalytics = new Typecho_Widget_Helper_Form_Element_Text('GoogleAnalytics', NULL, NULL, _t('Google 统计代码'));
    $GoogleAnalytics->input->setAttribute('class', 'mini');
    $form->addInput($GoogleAnalytics);
    
	$banner = new Typecho_Widget_Helper_Form_Element_Textarea('banner', NULL, NULL, _t('Banner'), _t('输入图片URL，如有多个则一行一个，随机选择展示。'));
    $form->addInput($banner);
    
    $pjaxCompleteAction = new Typecho_Widget_Helper_Form_Element_Textarea('pjaxCompleteAction', NULL, NULL, _t('PJAX RELOAD'), _t('启用 PJAX 选项后, 你的第三方插件可能会在 PJAX 中失效。你可能需要在这里重新加载。<br>在这里写入你需要进行处理的 JS 代码。并确保正确,否则可能会导致后续 JS 代码无法执行。'));
    $form->addInput($pjaxCompleteAction);
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
