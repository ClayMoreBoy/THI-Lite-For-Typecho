<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('component/header.php'); ?>
<div class="post">
    <div class="grid grid-fluid">
        <?php 
            if (array_key_exists ('thumb', unserialize ($this->___fields ()))) {
                $postImage = Content::randomThumb ($this->fields->thumb);
            } else {
                $postImage = THI::randomBanner($this->options->banner);
            }
        ?>
        <div class="siteHeaderBG" style="background-image: url(<?php echo $postImage ?>);"></div>
    </div>
    <div class="">
        <div class="">
            <div id="post-<?php $this->cid(); ?>">
                <nav class="postNav detail animated fadeIn noselect">
                    <div class="postNavInner animated fadeInDown">
                        <h2><?php $this->title(); ?></h2>
                        <div class="menu">
                            <ul class="menu-items" id="toc"></ul>
                        </div>
                        <div class="header-cta"><a class="btn-factory-link is-right" href="#postComment">Comment</a></div>
                    </div>
                </nav>
                <div class="postBody" id="postBody">
                    <div id="postContentTemp" style="display:none!important"><?php $this->content(); ?></div>
                    <div id="postContent"></div>
                    <section class="chapterSpecs material detail postCommentDom">
                        <div class="postContent" id="postComment">
                            <?php $this->need('component/comments.php'); ?>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->need('component/footer.php'); ?>
