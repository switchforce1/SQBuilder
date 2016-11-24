<?php

namespace StructuredQuery\BuilderBundle\Tests\Model;

use StructuredQuery\BuilderBundle\Model\SQContainer as SQContainer;

class SQContainerTest  extends \PHPUnit_Framework_TestCase
{
    public $container;
    
    public function setUp()
    {
        $this->sqcontainer = new SQContainer();
    }  
    
    
    public function selectContainer($containerNum = null)
    {
        $criterias = array();
        for ($i=1; $i <= 3 ; $i++)
        {
           $criterias[$i] = SQCriteriaTest::selectCriteria($i); 
        }
        
        $caseContainer  = new SQContainer();
        switch($containerNum)
        {
            case 1:
                $caseContainer->setCoordinator("ET");
                $caseContainer->addSQCriteria($criterias[1]);
                $caseContainer->addSQCriteria($criterias[1]);
                $caseContainer->addSQCriteria($criterias[1]);
                break;
            case 2:
                $caseContainer->setCoordinator("OU");
                $caseContainer->addSQCriteria($criterias[1]);
                $caseContainer->addSQCriteria($criterias[1]);
                $caseContainer->addSQCriteria($criterias[1]);
                break;
            case 3:
                $caseContainer->setCoordinator("OU");
                $caseContainer->addSQCriteria($criterias[1]);
                $caseContainer->addSQCriteria($criterias[2]);
                $caseContainer->addSQCriteria($criterias[3]);
                break;
            default :
                $caseContainer->setCoordinator("ET");
                $caseContainer->addSQCriteria($criterias[3]);
                $caseContainer->addSQCriteria($criterias[1]);
                $caseContainer->addSQCriteria($criterias[2]);
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
