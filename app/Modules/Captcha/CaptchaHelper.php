<?php

namespace App\Modules\Captcha;


use Gregwar\Captcha\CaptchaBuilder;

class CaptchaHelper
{
    /**
     * @return string
     */
    static function getCaptchaUrl()
    {
        return config('captcha.url');
    }

    static function renderCaptcha()
    {
        $captcha = new Captcha(new CaptchaBuilder());
        return $captcha->renderCaptcha();
    }
}