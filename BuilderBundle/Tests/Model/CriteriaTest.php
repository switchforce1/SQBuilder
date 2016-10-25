<?php

namespace StructuredQuery\BuilderBundle\Tests\Model;

use StructuredQuery\BuilderBundle\Model\Criteria as SQCriteria;

class CriteriaTest  extends \PHPUnit_Framework_TestCase
{
    //put your code here
    public $criteria;
    public function setUp()
    {
        $this->criteria = new SQCriteria();
    } 
    
    public static function selectCriteria($criteriaNum = null)
    {
        $caseCriteria  = new SQCriteria();
        switch($criteriaNum )
        {
            case 1:
                $caseCriteria->setParameter("nom");
                $caseCriteria->setOperator(" = ");
                $caseCriteria->setValue("albert");                
                break;
            case 2:
                $caseCriteria->setParameter("prenom");
                $caseCriteria->setOperator(" = ");
                $caseCriteria->setValue("flauriant"); 
                break;
            case 3:
                $caseCriteria->setParameter("age");
                $caseCriteria->setOperator(" > ");
                $caseCriteria->setValue("20"); 
                break;
            default :
                $caseCriteria->setParameter("parametre");
                $caseCriteria->setOperator(" <> ");
                $caseCriteria->setValue("valeur"); 
                break;
        }  
        return $caseCriteria;
    }   
    
    /**
     * toString Provider
     * 
     * [ $criteria, $criteriaString, $description]
     */
    public function toStringProvider()
    {
        return [
                [$this->selectCriteria(1), "nom = albert expect", "Critere de nom"],
                [$this->selectCriteria(2), "prenom = flauriant", "Critere de prenom"],
                [$this->selectCriteria(3), "age > 20", "Critere d'age"],
                [$this->selectCriteria(4), "parametre <> valeur", "Un simple parametre"],
                ];  
    }
    
    /**
     * 
     *
     * @dataProvider toStringProvider
     */
    public function testToString($criteria, $criteriaString, $description)
    {
        var_dump($criteria);
        $this->assertEquals($criteriaString, $criteria->toString(), $description);
        $this->assertTrue(TRUE);        
    }
}
