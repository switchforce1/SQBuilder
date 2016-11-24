<?php

namespace StructuredQuery\BuilderBundle\Tests\Model;

use StructuredQuery\BuilderBundle\Model\Container as SQContainer;

class SQContainerTest  extends \PHPUnit_Framework_TestCase
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
           $criterias[$i] = CriteriaTest::selectCriteria($i); 
        }
        
        $caseContainer  = new SQContainer();
        switch($containerNum)
        {
            case 1:
                $caseContainer->setCoordinator("ET");
                $caseContainer->addCriteria($criterias[1]);
                $caseContainer->addCriteria($criterias[1]);
                $caseContainer->addCriteria($criterias[1]);
                break;
            case 2:
                $caseContainer->setCoordinator("OU");
                $caseContainer->addCriteria($criterias[1]);
                $caseContainer->addCriteria($criterias[1]);
                $caseContainer->addCriteria($criterias[1]);
                break;
            case 3:
                $caseContainer->setCoordinator("OU");
                $caseContainer->addCriteria($criterias[1]);
                $caseContainer->addCriteria($criterias[2]);
                $caseContainer->addCriteria($criterias[3]);
                break;
            default :
                $caseContainer->setCoordinator("ET");
                $caseContainer->addCriteria($criterias[3]);
                $caseContainer->addCriteria($criterias[1]);
                $caseContainer->addCriteria($criterias[2]);
                break;
        }
        return $caseContainer;
    }        


    /**
     * [ $container, $containerString, $description ]
     */
    public function toStringProvider()
    {
       return [
                [$this->selectContainer(1),
                    "(nom = albert ET nom = albert ET nom = albert)", 
                    "Critere de nom"],
                [$this->selectContainer(2), 
                    "(nom = albert OU nom = albert OU nom = albert)", 
                    "Critere d'age"],
                [$this->selectContainer(3), 
                    "(nom = albert OU prenom = flauriant OU age > 20)",
                    "Critere de prenom"],
                [$this->selectContainer(4), 
                    "(age > 20 ET nom = albert ET prenom = flauriant)", 
                    "Un simple parametre"],
                ];
    }
    
    /**
     * @covers ::toString
     *
     * @dataProvider toStringProvider
     */
    public function testToString($container, $containerString, $description)
    {
        $this->assertEquals($container->toString(), $containerString, $description);
    }       
}
