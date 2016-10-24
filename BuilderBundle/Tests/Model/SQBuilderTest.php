<?php
namespace StructuredQuery\BuilderBundle\Tests\Model;

use StructuredQuery\BuilderBundle\Model\SQBuilder;

class SQBuilderTest extends \PHPUnit_Framework_TestCase 
{
    public $sQBuilder;
    public function setUp()
    {
        $this->sQBuilder = new SQBuilder();
    }
        
        
        
    /**
     * [ $requestArray, $expectString, $description ]
     */
    public function getFinalParamsProvider()
    {
        return [
                [["coordinator"=>"ET",'conditions'=>["nom = version", "prenom = version"]], "(nom = version ET prenom = version)", "Une imbrication"],
                [[ ], "", "Une imbrication"],
                [[ ], "", "Une imbrication"],
                ];
        
    }
    
    /**
     * @covers ::getFinalParams
     *
     * @dataProvider getFinalParamsProvider
     */
    public function testgetFinalParams($requestArray, $expectString, $description)
    {
        $this->assertEquals($this->sQBuilder->getFinalParams($requestArray), $expectString, $description);
    }
    
    //getInnerArray
     /**
     * [ $requestArray, $expectArray, $description ]
     */
    public function getInnerArrayProvider()
    {
        return [
                [["coordinator"=>"ET",'conditions'=>["nom = version", "prenom = version"]], ["nom = version", "prenom = version"], "Une imbrication"],
                [[ ], null, "Une imbrication"],
                [[ ], null, "Une imbrication"],
                ];
        
    }
    
    /**
     * @covers ::getInnerArray
     *
     * @dataProvider getInnerArrayProvider
     */
    public function testgetInnerArray($requestArray, $expectString, $description)
    {
        $this->assertEquals($this->sQBuilder->getInnerArray($requestArray), $expectString, $description);
    }
}
