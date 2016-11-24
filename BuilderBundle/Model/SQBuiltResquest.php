<?php
namespace StructuredQuery\BuilderBundle\Model;

class BuiltResquest {
   
    //les relation à générer en cas de jointure
    protected $relations ;
    
    //les objets de la request ne necissitant pas de jointure
    protected $entityObjects;
    
    public function __construct() 
    {
        $this->relations =  array();
        $this->entityObjects = array();
    }

    public function getRelations() 
    {
        return $this->relations;
    }

    public function getEntityObjects()
    {
        return $this->entityObjects;
    }

    public function setRelations($relations)
    {
        $this->relations = $relations;
    }

    public function setEntityObjects($entityObjects) 
    {
        $this->entityObjects = $entityObjects;
    }


    
}
