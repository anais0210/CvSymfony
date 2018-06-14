<?php

namespace AppBundle\Services;

/**
 * class CvAntispam
 */
class CvAntispam
{
    private $mailer;
    private $locale;
    private $minLength;

     /**
     * CvAntispam constructeur
     * 
     * @param Swift_Mailer $mailer
     * @param Swift_Mailer $locale
     * @param Swift_Mailer $minLength
     */
    public function __construct(\Swift_Mailer $mailer, $locale, $minLength)
    {
        $this->$mailer = $mailer;
        $this->$locale = $locale;
        $this->$minLength = (int) $minLength;
    }
    /**
     * @param string $text
     * @return bool
     */
    public function isSpam($text)
    {
        return strlen($text)<$this->$minLength;
    }
}