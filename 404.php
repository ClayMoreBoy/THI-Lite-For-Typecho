<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" class="t-white">
    <head>
        <meta charset="<?php $this->options->charset(); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="HandheldFriendly" content="True" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="theme-color" content="#00BCD4" />        
        <link rel="stylesheet" href="<?php $this->options->themeUrl('assets/css/style.css'); ?>">
        <title>页面未找到</title>
        <style>
            html {
                font-family: 'Roboto',sans-serif;
                font-size: 14px;
                overflow-y: scroll;
                -webkit-box-sizing: border-box;
                box-sizing: border-box;
                height: 100%;
            }
            
            .t-white,.t-white body {
                background: #fff;
                fill: #fff;
                overflow: hidden;
            }
            
            .app-ready {
                display: block
            }
            
            body {
                height: 100%
            }
            
            .blank-page {
                position: relative;
                height: 100%;
                width: 100%
            }
            
            .blank-page error {
                position: absolute;
                top: 40%;
                left: 50%;
                -webkit-transform: translate(-50%,-50%);
                transform: translate(-50%,-50%);
            }
            
            error {
                display: block;
                font-family: 'Roboto Mono',monospace;
                min-width: 680px;
                text-align: center
            }
            
            .error-emoji {
                color: rgba(0,0,0,0.4);
                font-size: 150px
            }
            
            .error-text {
                color: rgba(0,0,0,0.4);
                line-height: 21px;
                margin-top: 60px;
                white-space: pre-wrap
            }
        </style>
    </head>
    
    <body class="app-ready">
        <div class="blank-page" style="display:none">
            <error>
              <div class="error-emoji" id="error-emoji"></div> 
              <div class="error-text">Unfortunately, this page doesn't exist.</div> 
            </error>
        </div>
        
        <script type="text/javascript" src="<?php $this->options->themeUrl('assets/js/function.js'); ?>"></script>
        <script>Page.Error();</script>
    </body>
</html>
