<?php

/**
 * Valid Values for PG Rating
 */
abstract class PG_Rating{
    const G = "g";
    const PG = "pg";
    const R = "r";
    const X = "x";
}

/**
 * Valid Values for the default image.
 * This type of image will be dsiplayed, when no gravatar was found.
 */
abstract class Default_Grav{
    const GRAVICON = ""; //the default gravatar icon
    const CODE_404 = "404"; //do not load any image if none is associated with the email hash, instead return an HTTP 404 (File Not Found) response
    const MM = "mm"; //(mystery-man) a simple, cartoon-style silhouetted outline of a person (does not vary by email hash)
    const IDENT = "identicon"; // a geometric pattern based on an email hash
    const MONSTER = "monsterid"; //a generated 'monster' with different colors, faces, etc
    const WAVATAR = "wavatar"; //generated faces with differing features and backgrounds
    const RETRO = "retro"; //awesome generated, 8-bit arcade-style pixelated faces
    const BLANK = "blank"; //a transparent PNG image
}

/**
 * Simple Wrapper for fetching Gravatars.
 * https://gravatar.com/support/what-is-gravatar/
 * No parameter check is done, this class (function) is just for convenience
 *
 * @author Fabian Neffgen
 */
class Gravatar {
    const HTTP_URL = 'http://www.gravatar.com/avatar/';
    const HTTPS_URL = 'https://secure.gravatar.com/avatar/';
    
    /**
     * Calculates the URL of the a Gravtar
     * 
     * @param string $email the email Address
     * @param int $size the width or height in pixels (avatars are square)
     * @param string $rating see "class" PG_Rating
     * @param string $default_grav see "class" Default_Grav
     * @param boolean $secure should the URL be a https address instead of unencrypted http
     * @return string the constructed URL for the gravatar
     */
    public static function getURL($email, $size = 100, $rating = PG_Rating::G, $default_grav = Default_Grav::GRAVICON, $secure = true){
        $hash = md5(strtolower(trim($email)));
        $base_url = $secure ? self::HTTPS_URL : self::HTTP_URL;
        
        return $base_url . $hash . "?s=".$size."&amp;d=".$default_grav."&amp;r=".$rating;
    }
    
}

?>