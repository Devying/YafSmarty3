<?php

abstract class Base_Action extends Yaf_Action_Abstract{
    function assign( $key, $val ) {
        $this->getView()->assign( $key, $val );
    }
}