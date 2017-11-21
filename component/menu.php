<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<nav class="siteNavs" id="navbar">
    <ul class="grid siteNavsList">
        <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
        <?php while($pages->next()): ?>
            <div class="siteNavsListItem nav-<?php $pages->slug(); ?>">
                <li><a href="<?php $pages->permalink(); ?>"><?php $pages->title(); ?></a></li>
            </div>
        <?php endwhile; ?>
    </ul>
</nav>