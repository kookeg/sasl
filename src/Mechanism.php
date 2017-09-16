<?php 
namespace Cooker\SASL;

/**
 * SASL mechanism interface 
 *
 * @package    Cooker 
 * @subpackage SASL
 * @author     Cooker <thinklang0917@gmail.com> 
 */
interface Mechanism 
{
    public function getResponse();

}
