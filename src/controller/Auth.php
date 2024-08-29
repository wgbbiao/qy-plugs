<?php

declare(strict_types=1);

namespace qyPlugs\plug\controller;


class Auth
{
    function signature(): string
    {
        $app_id = 'your app_id';
        $app_secret =  'your app_secret';
        // 随机字符串
        $nonceStr = random_bytes(20);
        $timestamp = time();
        $signStr = $app_id . $app_secret . $nonceStr . $timestamp;
        return sha1($signStr);
    }
}
