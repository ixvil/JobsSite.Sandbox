<?php

namespace App\Modules\Captcha;


use Gregwar\Captcha\CaptchaBuilder;

/**
 * @property CaptchaBuilder captchaBuilder
 */
class Captcha
{
    private $captchaBuilder;

    /**
     * Captcha constructor.
     * @param CaptchaBuilder $captchaBuilder
     */
    function __construct(CaptchaBuilder $captchaBuilder)
    {
        $this->captchaBuilder = $captchaBuilder;
        $this->captchaBuilder->build();
    }

    function renderCaptcha()
    {
        session(['captcha' => $this->captchaBuilder->getPhrase()]);
        return $this->captchaBuilder->output();
    }
}