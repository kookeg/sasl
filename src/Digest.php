<?php 
namespace Cooker\SASL;

/**
 * Digest Trait 
 *
 * @package    Cooker 
 * @subpackage SASL 
 * @author     Cooker <thinklang0917@gmail.com> 
 */

trait Digest 
{

    /**
     * HMAC MD5 digest 
     *
     * @access public 
     * @param  string $secretKey The secret key 
     * @param  string $data      The data to hash 
     * @param  bool   $raw       The return format binary or hexadecimal
     * @return string HMAC MD5 digest 
     */

    public function HMACMD5($secretKey, $data, $raw = false)
    {
        $secretKey = strlen($secretKey) > 64 ? pack('H32', $secretKey)         : $secretKey; 
        $secretKey = strlen($secretKey) < 64 ? str_pad($secretKey, 64, chr(0)) : $secretKey;
        $ipad      = substr($secretKey, 0, 64) ^ str_repeat(chr(0x36), 64);
        $opad      = substr($secretKey, 0, 64) ^ str_repeat(chr(0x5C), 64);
        $inner     = pack('H32', md5($ipad . $data));
        return md5($opad . $inner, $raw);
    }

    /**
     * HMAC SHA1 digest 
     *
     * @access public 
     * @param  string $secretKey The secret key 
     * @param  string $data      The data to hash 
     * @param  bool   $raw       The return format binary or hexadecimal
     * @return string HMAC SHA1 digest 
     */

    public function HMACSHA1($secretKey, $data, $raw = false)
    {

        $secretKey = strlen($secretKey) > 64 ? sha1($secretKey, true)          : $secretKey; 
        $secretKey = strlen($secretKey) < 64 ? str_pad($secretKey, 64, chr(0)) : $secretKey;
        $ipad      = substr($secretKey, 0, 64) ^ str_repeat(chr(0x36), 64);
        $opad      = substr($secretKey, 0, 64) ^ str_repeat(chr(0x5C), 64);
        $inner     = pack('H40', sha1($ipad . $data));
        return sha1($opad . $inner, $raw);
    }

}
