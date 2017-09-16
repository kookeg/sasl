<?php 
namespace Cooker\SASL;

/**
 * CramMD5 SASL Mechanism 
 *
 * @package    Cooker 
 * @subpackage SASL
 * @author     Cooker <thinklang0917@gmail.com> 
 */

class CramMD5 implements Mechanism 
{

    use Digest;

    protected $username  = '';
    protected $password  = '';
    protected $challenge = '';

    public function getResponse()
    {
        return 
            $this->getUserName() 
            . $this->HMACMD5($this->getPassword(), $this->getChallenge());    
    }

    public function setUserName($username)
    {
        $this->username = $username; 
        return $this;
    }

    public function getUserName()
    {
        return (string) $this->username; 
    }

    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    public function getPassword()
    {
        return (string) $this->password; 
    }

    public function setChallenge($challenge)
    {
        $this->challenge = $challenge;
        return $this;
    }

    public function getChallenge()
    {
        return (string) $this->challenge;
    }
}
