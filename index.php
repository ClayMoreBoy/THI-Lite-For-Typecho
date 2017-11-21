<?php
/**
 * 一个随便写写的主题 Theme
 * 
 * @package THI Lite
 * @author Mint Jin
 * @version 1.0.0
 * @link https://jcl.moe
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
if (!isset ($_GET['ajax_load'])) {
	$this->need('component/header.php');
}
?>
<div class="index">
    <div class="grid grid-fluid">
        <div class="siteHeaderBG" style="background-image: url(<?php echo THI::randomBanner($this->options->banner); ?>);"></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="posts">
                <?php while($this->next()): ?>
                    <article>
                        <a href="<?php $this->permalink() ?>">
                            <div class="postCard">
                                <?php 
                                    if (array_key_exists ('thumb', unserialize ($this->___fields ()))) {
                                        $postImageRET = Content::randomThumb ($this->fields->thumb);
                                        if (is_array($postImageRET)) {
                                            $postImage = 'style="background-image:url(' . $postImageRET['img'] . ');background-position: ' . $postImageRET['position'] . ';"';
                                        } else {
                                            $postImage = 'style="background-image:url(' . $postImageRET . ')"';
                                        }
                                    }
                                ?>
                                <div class="postImage" <?php echo $postImage ?>></div>
                                <div class="postInfo">
                                    <h2 class="postTitle" itemprop="headline"><?php $this->title() ?></h2>
                                    <p class="postCaption">
                                        <?php $this->author(); ?> • 
                                        <?php $this->date('F j, Y'); ?> • 
                                        <?php $this->commentsNum(_t('No Comment'), _t('Only 1 Comment'), _t('%d Comments')); ?> • 
                                        <?php if (array_key_exists ('viewsNum', unserialize ($this->___fields ()))) { echo $this->fields->viewsNum . ' 次阅读'; } else { echo '0 次阅读'; } ?>
                                    </p>
                                </div>
                                <div class="postContent animated fadeInDown"><?php $this->excerpt(100); ?></div>
                            </div>
                        </a>
                    </article>
                <?php endwhile; ?>
            </div>
        </div>
        <div class="pagination">
            <?php $this->pageLink('上一页'); ?>
            <?php $this->pageLink('下一页', 'next'); ?>
        </div>
    </div>
</div>
<?php 
    if (!isset ($_GET['ajax_load'])) {
    	$this->need('component/footer.php');
    } 
?>
