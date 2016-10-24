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
                $caseCriteria->setValue("flaurent"); 
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
    }   
    
    /**
     * tostring Provider
     * 
     * [ $criteria, $criteriaString, $description ]
     */
    public function tostringProvider()
    {
        return [
                [$this->selectCriteria(1), "nom = albert", "Critere de nom"],
                [$this->selectCriteria(2), "prenom = flauriant", "Critere de prenom"],
                [$this->selectCriteria(3), "age > 20", "Critere d'age"],
                [$this->selectCriteria(4), "parametre <> valeur", "Un simple parametre"],
                ];  
    }
    
    /**
     * @covers ::toString
     *
     * @dataProvider toStringProvider
     */
    public function testToString($criteria, $criteriaString, $description )
    {
       // $this->assertEquals($criteria->toString(), $criteriaString, $description);
    }
}
