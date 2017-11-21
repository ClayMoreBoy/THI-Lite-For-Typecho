<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

class Content {
    public static function randomThumb ($thumbs) {
        if (empty($thumbs)) {
            $thumb = self::noThumb();
        } else {
            $thumbs = mb_split("\n", $thumbs);
            $thumb = $thumbs[rand(0, count($thumbs) - 1)];
            $thumb = trim($thumb);
        }
        if (strpos ($thumb, '!') !== false) {
            $thumbArr = explode('!', $thumb);
            $thumb = [
                'img' => $thumbArr[0],
                'position' => $thumbArr[1]
                
            ];
        }
        return $thumb;
    }
    
    public static function noThumb() {
        $imageList = [
            THI_Const::STATIC_URL . '/Background/10.jpg!top',
            THI_Const::STATIC_URL . '/Background/14.png',
            THI_Const::STATIC_URL . '/Background/18.jpg',
            THI_Const::STATIC_URL . '/Background/19.jpg',
            THI_Const::STATIC_URL . '/Background/25.jpg',
            THI_Const::STATIC_URL . '/Background/27.png',
            THI_Const::STATIC_URL . '/Background/30.jpg',
            THI_Const::STATIC_URL . '/Background/36.jpg',
            THI_Const::STATIC_URL . '/Background/68.png',
            THI_Const::STATIC_URL . '/Background/70.jpg'
        ];
        
        return $imageList[array_rand ($imageList)];
    }
    
    public static function viewCounter ($archive) {
        $cid = $archive->cid;
        $views = Typecho_Cookie::get('__typecho_views');
        $views = !empty($views) ? explode(',', $views) : array();
        if(!in_array($cid, $views)){
            $db = Typecho_Db::get();
            $field = $db->fetchRow($db->select()->from('table.fields')->where('cid = ? AND name = ?', $cid , 'viewsNum'));
            if(empty($field)){
                $db->query($db->insert('table.fields')
                ->rows(array('cid' => $cid, 'name' => 'viewsNum', 'type' => 'str', 'str_value' => 1, 'int_value' => 0, 'float_value' => 0)));
            }else{
                $db->query($db->update('table.fields')->expression('str_value', 'str_value + 1')->where('cid = ? AND name = ?', $cid , 'viewsNum'));
            }
            array_push($views, $cid);
            $views = implode(',', $views);
            Typecho_Cookie::set('__typecho_views', $views); //记录到cookie
        }
    }
    
    function getPostImg ($cid) {
    	$db = Typecho_Db::get ();
    	$rs = $db->fetchRow($db->select ('table.contents.text')
    		->from ('table.contents')
    		->where ('cid=?', $cid));
    	$content = preg_replace ("/\t|\n|\r/", "", $rs['text']);
    	if (preg_match ('/\[.*\]:*(.*?(png|jpeg|jpg|gif|bmp)$)/', $content, $result)) {
    		return $result[1];
    	} else if (preg_match ('/<img.*src="(.*?)".*?>/', $content, $result)) {
    		return $result[1];
    	} else {
    		return '';
    	}
    }
}
