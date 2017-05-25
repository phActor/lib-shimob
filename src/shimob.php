<?php
/**
 * Created by PhpStorm.
 * User: tmp
 * Date: 2017/05/25
 * Time: 2:32 PM
 */

namespace phActor\lib;


class test {

    function AA($AAp) {
        return $AAp . " f";
    }

}

class message extends \SplEnum
{
    const __default = self::ONCALL;

    const ONCALL   = 0x0;
    const ONCHANGE = 0x1;
    const ONSET    = 0x2;
    const ONGET    = 0x3;
}

/**
 * Class bindable
 * Type ENUM
 * @package phActor\lib
 *
 */
class bindable {

    private $MESSAGE  = message::__default;
    public $CALLBACK = null;

    /**
     * @param message $i
     */
    function setBindType (message $i){
        $this->MESSAGE = $i;
    }

    function __set($name, $value)
    {
        // TODO: Implement __set() method.
        // TODO: EXPERIMENTAL DELME
        if(gettype($value) == __NAMESPACE__."\message"){
            $this->setBindType($value);
        }
    }


}

abstract class shimob
{

    protected $_bindœ=null;

    /**
     * shimob constructor.
     */
    function __construct()
    {
        $this->_bindœ = new \SplStack();

    }

    /**
     *
     */
    function _bind(bindable $bind, $i){
        /**
         * @todo refact, w/ownship
         */
        if(is_callable($bind->CALLBACK)){
            $this->_bindœ->add($i,$bind);
        }else throw new \BadFunctionCallException("\$callback needs to be callable");
    }

}