<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<?php if(!THI::isPjax()):?>
        </div>
        <div class="gototop">
            <span class="goTOP"></span>
        </div>
    </div>
    

    <footer class="siteFooter">
        <section class="copyright"><a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>  &copy; <?php echo date("Y") ?></section>
        <hitokoto></hitokoto>
        <section class="theme">Theme THI Lite by <a href="https://jcl.moe" target="_blank">Momiji Jin</a> / Proudly published with <a href="http://typecho.org" target="_blank">Typecho</a></section>
    </footer>
    <menu></menu>

    <script type="text/javascript" src="<?php $this->options->themeUrl('assets/js/function.js'); ?>"></script>
    <script>
        Page.Init();
    </script>
    <?php echo Welcome::OutPut() ?>
    <?php $this->footer(); ?>
    <script>
    <?php
        if (isset($this->options->footerOutPut)) {
            echo $this->options->footerOutPut;
        }
    ?>
    </script>
</body>
</html>
<?php endif;?>
