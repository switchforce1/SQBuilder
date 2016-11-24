<?php

namespace StructuredQuery\BuilderBundle\Tests\Model;

use StructuredQuery\BuilderBundle\Model\BuiltResquest;

class SQBuiltResquestTest extends \PHPUnit_Framework_TestCase
{
    public $builtRequest;
    
    public function setUp()
    {
        $this->builtRequest = new BuiltResquest();
    }        
 
}
