<?php
class Bash
{
    private $url;
    
    public function __construct($url)
    {
        $this->url = $url;
    }
    
    public function receive($url)
    {
        return file_get_contents($url);
    }
    
    //preg_match_all('#[-a-zA-Z0-9@:%_\+.~\#?&//=]{2,256}\.[a-z]{2,4}\b(\/[-a-zA-Z0-9@:%_\+.~\#?&//=]*)?#si', $targetString, $result);
    public function split()
    {
        $c = $this->receive($this->url);
        return explode("\n",$c);
    }
}