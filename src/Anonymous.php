<?php 
namespace Cooker\SASL;

/**
 * Anonymous SASL Mechanism 
 *
 * @package    Cooker 
 * @subpackage SASL
 * @author     Cooker <thinklang0917@gmail.com> 
 */

class Anonymous implements Mechanism 
{

    protected $token = '';

    public function getResponse()
    {
        return $this->getToken();    

    }

    public function setToken($token)
    {
        $this->token = $token; 
        return $this;
    }

    public function getToken()
    {
        return (string) $this->token; 
    }

}
