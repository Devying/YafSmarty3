<?php

class M3u8Action extends Base_Action{
    public function execute(){
        $m3u8_info=<<<m3u8
#EXTM3U
#EXT-X-VERSION:3
#EXT-X-STREAM-INF:PROGRAM-ID=1, BANDWIDTH=512000, RESOLUTION=1280x720
http://v2.mukewang.com/a740dfe8-9313-4b9b-8965-8bebf683c7a8/H/H.m3u8
#EXT-X-STREAM-INF:PROGRAM-ID=1, BANDWIDTH=384000, RESOLUTION=1280x720
http://v2.mukewang.com/a740dfe8-9313-4b9b-8965-8bebf683c7a8/M/M.m3u8
#EXT-X-STREAM-INF:PROGRAM-ID=1, BANDWIDTH=256000, RESOLUTION=720x480
http://v2.mukewang.com/a740dfe8-9313-4b9b-8965-8bebf683c7a8/L/L.m3u8
m3u8;

        $key = "imooc";
        $sec = $this->xor_enc($m3u8_info,$key);
        echo $sec;
        die;
    }

    public function xor_enc($str,$key)
    {
        $crytxt = '';
        $keylen = strlen($key);
        for($i=0;$i<strlen($str);$i++)
        {
            $k = $i%$keylen;
            $crytxt .= $str[$i] ^ $key[$i%$keylen];
        }
        return $crytxt;
    }
}
