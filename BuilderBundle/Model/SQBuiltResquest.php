<?php
namespace StructuredQuery\BuilderBundle\Model;

class SQBuiltResquest {
   
    //les relation à générer en cas de jointure
    protected $relations ;
    
    //les objets de la request ne necissitant pas de jointure
    protected $entityObjects;
    
    //Le conteneur de requete a genenerer avec les parametres
    protected $container ; 


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

    public function getContainer() 
    {
        return $this->container;
    }

    public function setContainer($container) 
    {
        $this->container = $container;
    }


    
}
