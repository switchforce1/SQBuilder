<?php

namespace StructuredQuery\BuilderBundle\Tests\Model;

use StructuredQuery\BuilderBundle\Model\SQBuiltResquest;

class SQBuiltResquestTest extends \PHPUnit_Framework_TestCase
{
    public $builtRequest;
    
    public function setUp()
    {
        $this->builtRequest = new SQBuiltResquest();
    }        
    
    /**
     * test factice pour avoir du ver ;)
     */
    public function testHello()
    {
        $this->assertTrue(TRUE);
    }        
 
}
