<?php
class Cdz_RevSlideshow_Helper_Data extends Mage_Core_Helper_Abstract
{
	function replaceFileName($filename) {
        $ext = end(explode('.',$filename));
        // Replace all weird characters
        $replacer = preg_replace('/[^a-zA-Z0-9-_.]/','-', substr($filename, 0, -(strlen($ext)+1)));
        // Replace dots inside filename
        $replacer = str_replace('.','-', $replacer);
        return strtolower($replacer.'.'.$ext);
    }

    public function getImageUrl($imageName)
    {
        return str_replace('index.php/','',Mage::getBaseUrl()).'media/cdz/revslideshow/images'."/". $imageName;
    }

    public function getThumbnailImage($image,$width = 255, $height = 255){
        if(!$image) return;

        $imagePathFull = Mage::getBaseDir('media').DS.'cdz' . DS .'revslideshow'.DS.'images'.DS.$image;
        $resizePath = $width . 'x' . $height;
        $resizePathFull = Mage::getBaseDir('media'). DS .'cdz' . DS .'revslideshow'. DS . 'resize' . DS . $resizePath . DS . $image;

        if (file_exists($imagePathFull) && !file_exists($resizePathFull)) {            
            $imageObj = new Varien_Image($imagePathFull);
            $imageObj->constrainOnly(TRUE);
            $imageObj->resize($width,$height);
            $imageObj->save($resizePathFull);
        }
        
        return str_replace('index.php/','',Mage::getBaseUrl('media')). 'cdz/revslideshow/resize/' . $resizePath . "/"  . $image;
    }   

    function checkYoutubeLink($url)
    {
        return (preg_match('/youtu\.be/i', $url) || preg_match('/youtube\.com\/watch/i', $url));
    }
    function checkVimeoLink($url)
    {
        return (preg_match('/vimeo\.com/i', $url));
    }
    function getYoutubeVideoId($url)
    {
        if($this->checkYoutubeLink($url))
        {
            $pattern = '/^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/';
            preg_match($pattern, $url, $matches);
            if (count($matches) && strlen($matches[7]) == 11)
            {
              return $matches[7];
            }            
        }

        return '';
    }
    function getVimeoVideoId($url)
    {
        if($this->checkVimeoLink($url))
        {
            $pattern = '/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/';
            preg_match($pattern, $url, $matches);
            if (count($matches))
            {
                return $matches[2];
            }
        }

        return '';
    }
    function getExtension($url)
    {
        $ext = pathinfo($url, PATHINFO_EXTENSION);
        if($ext)
            return $ext;
        return '';
    }

    function checkVideoUrl($url)
    {
        if($this->checkYoutubeLink($url))
            return 'youtube';
        else if($this->checkVimeoLink($url))
            return 'vimeo';
        else
            return $this->getExtension($url);
    }
}
	 