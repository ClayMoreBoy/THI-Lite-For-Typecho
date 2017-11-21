<?php
class Welcome {
    static function is_bot () {
        $bots = array(
            'Google Bot1' => 'googlebot',
            'Google Bot2' => 'google',
            'MSN' => 'msnbot',
            'Alex' => 'ia_archiver',
            'Lycos' => 'lycos',
            'Ask Jeeves' => 'jeeves',
            'Altavista' => 'scooter',
            'AllTheWeb' => 'fast-webcrawler',
            'Inktomi' => 'slurp@inktomi',
            'Turnitin.com' => 'turnitinbot',
            'Technorati' => 'technorati',
            'Yahoo' => 'yahoo',
            'Findexa' => 'findexa',
            'NextLinks' => 'findlinks',
            'Gais' => 'gaisbo',
            'WiseNut' => 'zyborg',
            'WhoisSource' => 'surveybot',
            'Bloglines' => 'bloglines',
            'BlogSearch' => 'blogsearch',
            'PubSub' => 'pubsub',
            'Syndic8' => 'syndic8',
            'RadioUserland' => 'userland',
            'Gigabot' => 'gigabot',
            'Become.com' => 'become.com',
            'Bot' => 'bot',
            'Spider' => 'spider',
            'yinheli_for_test' => 'dFirefox'
        );
        $useragent = $_SERVER['HTTP_USER_AGENT'];
        foreach ($bots as $name => $lookfor) {
            if (stristr($useragent, $lookfor) !== false) {
                return true;
                break;
            }
        }
    }
    
    function OutPut () {
        if (self::is_bot()) {
            return;
        }
    
        $referer = $_SERVER["HTTP_REFERER"]; 
        $refererhost = parse_url ($referer);
        $host = strtolower ($refererhost['host']);
        $ben = $_SERVER['HTTP_HOST'];    
       
        $callback = "HELLO！欢迎来自 " . $host . " 的朋友！";
        if ($referer == "" || $referer == NULL) {
            if (!Typecho_Cookie::get('_FirstView')) {
                Typecho_Cookie::set('_FirstView', '1', 0, Helper::options()->siteUrl);
                $callback = "欢迎您访问我的博客~  我倍感荣幸啊 嘿嘿";
            } else {
                $callback = "您直接访问了本站!  莫非您记住了我的 域名 .厉害~  我倍感荣幸啊 嘿嘿";
            }
        } else if (strstr ($ben, $host)) { 
            $callback = 'host'; 
        } else if (preg_match ('/baiducontent.*/i', $host)) {
            $callback = '您通过 百度快照 找到了我，厉害！';
        } else if (preg_match ('/baidu.*/i', $host)) {
            $callback = '您通过 百度 找到了我，厉害！';
        } else if (preg_match ('/so.*/i', $host)) {
            $callback = '您通过 好搜 找到了我，厉害！';
        } else if (!preg_match ('/www\.google\.com\/reader/i', $referer) && preg_match ('/google\./i', $referer)) {
            $callback = '您居然通过 Google 找到了我! 一定是个技术宅吧!';
        } else if (preg_match ('/search\.yahoo.*/i', $referer) || preg_match ('/yahoo.cn/i', $referer)) {
            $callback = '您通过 Yahoo 找到了我! 厉害！'; 
        } else if (preg_match ('/cn\.bing\.com\.*/i', $referer) || preg_match ('/yahoo.cn/i', $referer)) {
            $callback = '您通过 Bing 找到了我! 厉害！';
        } else if (preg_match ('/google\.com\/reader/i', $referer)) {
            $callback = "感谢你通过 Google 订阅我!  既然过来读原文了. 欢迎留言指导啊.嘿嘿 ^_^";
        } else if (preg_match ('/xianguo\.com\/reader/i', $referer)) {
            $callback = "感谢你通过 鲜果 订阅我!  既然过来读原文了. 欢迎留言指导啊.嘿嘿 ^_^";
        } else if (preg_match ('/zhuaxia\.com/i', $referer)) {
            $callback = "感谢你通过 抓虾 订阅我!  既然过来读原文了. 欢迎留言指导啊.嘿嘿 ^_^";
        } else if (preg_match ('/inezha\.com/i', $referer)) {
            $callback = "感谢你通过 哪吒 订阅我!  既然过来读原文了. 欢迎留言指导啊.嘿嘿 ^_^";
        } else if (preg_match ('/reader\.youdao/i', $referer)) {
            $callback = "感谢你通过 有道 订阅我!  既然过来读原文了. 欢迎留言指导啊.嘿嘿 ^_^";
        } 
        if ($callback != "host") {
            return '<script>Page.AddNotice("' . $callback . '");</script>';
        }    
    }
}