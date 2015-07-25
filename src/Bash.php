<?php
class Bash
{
    private $url;
    public function __construct($url) {
        $this->url = $url;
    }
    
    public function receive($url) {
        return file_get_contents($url);
    }
    
    public function jsonDecode($json)
    {
        return json_decode($json,true);
    }

    public static function makeLinks($content) {
        return preg_replace('@(https?://([-\w\.]+[-\w])+(:\d+)?(/([\w/_\.#-]*(\?\S+)?[^\.\s])?)?)@', '<a href="$1" target="_blank">$1</a>', $content);
    }
	
    public function process() {        
        $content = $this->receive($this->url);
        return $this->jsonDecode($content);
    }
}