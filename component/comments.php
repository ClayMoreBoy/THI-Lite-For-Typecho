<?php 
    if (!defined('__TYPECHO_ROOT_DIR__')) exit; 
    define('__TYPECHO_GRAVATAR_PREFIX__', 'https://gravatar.meow.moe/avatar/');
?>

<div id="comments">
    <?php
    $parameter = array(
        'parentId'      => $this->hidden ? 0 : $this->cid,
        'parentContent' => $this->row,
        'respondId'     => $this->respondId,
        'commentPage'   => $this->request->filter('int')->commentPage,
        'allowComment'  => $this->allow('comment')
    );

	$this->comments()->to($comments);
    ?>
    <?php if ($this->allow('comment')): ?>
    <div id="<?php $this->respondId(); ?>" class="respond">
        <div class="cancel-comment-reply">
            <?php $comments->cancelReply(); ?>
        </div>
        <span id="response" class="widget-title text-left">添加新评论</span>
        <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form">
            <?php if($this->user->hasLogin()): ?>
                <p class="comment-login-info">登录为 <a href="<?php $this->options->adminUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->index('Logout.do'); ?>" title="Logout">退出 &raquo;</a></p>
            <?php else: ?>
                <input type="text" name="author" id="author" placeholder="称呼" value="<?php $this->remember('author'); ?>" />
                <input type="email" name="mail" id="mail" placeholder="电子邮件" value="<?php $this->remember('mail'); ?>" />
                <input type="url" name="url" id="url" placeholder="网站"  value="<?php $this->remember('url'); ?>" />
            <?php endif; ?>
            <p>
                <textarea rows="5" name="text" id="textarea" placeholder="在这里输入你的评论..." style="resize:none;"><?php $this->remember('text'); ?></textarea>
            </p>
            <p style="margin-top: 10px">
                <span class="OwO"></span>
                <?php if (class_exists("CommentToMail_Plugin")):?>
                <span class="comment-mail-me">
                    <input name="banmail" type="checkbox" value="stop" id="comment-ban-mail">
                    <label for="comment-ban-mail">
                        <strong>不接收</strong>回复邮件通知
                    </label>
                </span>
                <?php endif;?>
            </p>
            <p><input type="submit" value="提交评论" data-now="刚刚" data-init="提交评论" data-posting="提交评论中..." data-posted="评论提交成功" data-empty-comment="必须填写评论内容" class="button" id="submit"></p>
        </form>
    </div>
    <?php else: ?>
        <div class="comment-closed">
            <p>该页面评论已关闭</p>
        </div>
    <?php endif;?>
    <?php if ($comments->have()): ?>
        <div class="comment-separator">
            <div class="comment-tab-current">
                <span class="comment-num"><?php $this->commentsNum(_t('评论列表'), _t('已有 1 条评论'), _t('已有 %d 条评论')); ?></span>
            </div>
        </div>
        <?php $comments->listComments(array('avatarSize' => 400, 'replyWord' => _t('回复'))); ?>
        <?php //$comments->pageNav('&laquo;', '&raquo;', 1); ?>
        <?php $comments->pageNav(_t('上一页'), _t('下一页'), 0, '', 'wrapClass=page-navigator&prevClass=btn btn-primary btn-small prev&nextClass=btn btn-primary btn-small next'); ?>
    <?php endif; ?>
</div>


