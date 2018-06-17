<?php

namespace AppBundle\Services;

/**
 * class CvAntispam
 */
class CvAntispam
{
    /** 
     * @var string 
     */
    private $locale;

    /** 
     * @var int 
     */
    private $minLength;

     /**
     * CvAntispam constructeur
     * 
     * @param string       $locale
     * @param int          $minLength
     */
    public function __construct($locale, $minLength)
    {
        $this->locale = $locale;
        $this->minLength = (int) $minLength;
    }
    /**
     * @param string $text
     * @return bool
     */
    public function isSpam($text)
    {
        return strlen($text) < $this->minLength;
    }
}