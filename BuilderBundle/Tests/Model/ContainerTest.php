<?php

namespace StructuredQuery\BuilderBundle\Tests\Model;

use StructuredQuery\BuilderBundle\Model\Container as SQContainer;

class ContainerTest  extends \PHPUnit_Framework_TestCase
{
    public $container;
    
    public function setUp()
    {
        $this->container = new SQContainer();
    }  
    
    
    public function selectContainer($containerNum = null)
    {
        $criterias = array();
        for ($i=1; $i <= 3 ; $i++)
        {
           $criterias[] = CriteriaTest::selectCriteria($i); 
        }
        
        $caseContainer  = new SQContainer();
        switch($criteriaNum )
        {
            case 1:
                
                break;
            case 2:
                break;
            case 3:
                break;
            default :
                break;
        }
        
    }        


    /**
     * [ $criteria, $criteriaString, $description ]
     */
    public function toStringProvider()
    {
       $this->assertTrue(true);
    }
    
    
}
