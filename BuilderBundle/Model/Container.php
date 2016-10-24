<?php
namespace StructuredQuery\BuilderBundle\Model;

class Container {
    //put your code here
    //le coordinateeur (ET ou OU)
    protected $coordinator; 
    
    //tableau de critere enventuel ( une ligne de contraite )
    protected $criterias;
    
    //Tableau des conteneurs eventuels
    protected $containers;


    public function __construct() 
    {
        $this->criterias = array();
        $this->containers = array();
    }
    
    public function getCoordinator() 
    { 
        return $this->coordinator;
    }

    public function getCriterias() 
    {
        return $this->criterias;
    }

    public function setCoordinator($coordinator) 
    {
        $this->coordinator = $coordinator;
    }

    public function setCriterias($criterias) 
    {
        $this->criterias = $criterias;
    }
    
    public function getContainers() 
    {
        return $this->containers;
    }

    public function setContainers($containers) 
    {
        $this->containers = $containers;
    }

    
    public function addCriteria(Criteria $criteria)
    {
        //Verifier qu'il s'agit bien de la classe criteria 
        if(!strpos($className = get_class($criteria), "Criteria"))
        {
           return null; 
        }       
        //Au cas où il s'agit bien de la classe des criteres,
        //On ajoute le critere 
        $this->criterias[] = $criteria;
    }
    
    public function addContainer(Container $container)
    {
        //Verifier qu'il s'agit bien de la classe container 
        if(!strpos($className = get_class($container), "Container"))
        {
           return null;
           
        }       
        //Au cas où il s'agit bien de la classe des criteres,
        //On ajoute le critere 
        $this->containers[] = $container;
    }
    
    public function toString()
    {
        //AU cas où il n'existe pas de critere de selection
        if(empty($this->criterias))
        {
            return "";
        }  
        
        $request = "(";
        $tempCriterias = $this->getCriterias();
        $tempContainers = $this->getContainers();
        
        foreach ($tempCriterias as $key => $tempCriteria)
        {
            //Si on est pas au premier critere
            if ($key > 0 )
            {
                $request .= " ".$this->coordinator." "; 
            }    
            $request .= $tempCriteria->toString();            
        } 
        
        foreach ($tempContainers as $keyContainer => $tempContainer)
        {
            //Si on est pas au premier critere
            if ($key > 0 )
            {
                $request .= " ".$this->coordinator." "; 
            }    
            $request .= $tempContainer->toString();            
        }   
        
        $request .= ")";
        return $request;
    }        
}
