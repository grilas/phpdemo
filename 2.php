<?php

$arr = [
"policy"=>["expire_time"=>""],
"description"=>"aaa",
"production_mode"=>false,
"appkey"=>"5d521d4e3fc195b523000353",
"payload"=>[
    "body"=>[
        "title"=>"aaaaa",
        "ticker"=>"aaaaa",
        "text"=>"aaaa",
        "after_open"=>"go_app",
        "play_vibrate"=>"true",
        "play_lights"=>"true",
        "play_sound"=>"true"
        ],
    "display_type"=>"notification",
    "extra"=>["type"=>"orderMessage","title"=>"推送成功","value"=>"2019081621663350077142"]
    ],
"device_tokens"=>"Ai5HK7RiJrrAZxaB8OaPX7PrcyURwKRSmcPEYrK3qf9C",
"type"=>"unicast",
"timestamp"=>'1566186202'];

       

var_dump($arr);
die;


?>