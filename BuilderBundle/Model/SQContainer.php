<?php
namespace StructuredQuery\BuilderBundle\Model;

class SQContainer {
    //put your code here
    //le coordinateeur (ET ou OU)
    protected $coordinator; 
    
    //tableau de critere enventuel ( une ligne de contraite )
    protected $sqcriterias;
    
    //Tableau des conteneurs eventuels
    protected $sqcontainers;


    public function __construct() 
    {
        $this->sqcriterias = array();
        $this->sqcontainers = array();
    }
    
    public function getCoordinator() 
    { 
        return $this->coordinator;
    }

    public function getCriterias() 
    {
        return $this->sqcriterias;
    }

    public function setCoordinator($coordinator) 
    {
        $this->coordinator = $coordinator;
    }

    public function setCriterias($criterias) 
    {
        $this->sqcriterias = $criterias;
    }
    
    public function getContainers() 
    {
        return $this->sqcontainers;
    }

    public function setContainers($containers) 
    {
        $this->sqcontainers = $containers;
    }

    
    public function addSQCriteria(SQCriteria $criteria)
    {
        //Verifier qu'il s'agit bien de la classe criteria 
        if(!strpos($className = get_class($criteria), "SQCriteria"))
        {
           return null; 
        }       
        //Au cas où il s'agit bien de la classe des criteres,
        //On ajoute le critere 
        $this->sqcriterias[] = $criteria;
    }
    
    
    
    public function addSQContainer(SQContainer $container)
    {
        //Verifier qu'il s'agit bien de la classe container 
        if(!strpos($className = get_class($container), "SQContainer"))
        {
           return null;
           
        }       
        //Au cas où il s'agit bien de la classe des criteres,
        //On ajoute le critere 
        $this->sqcontainers[] = $container;
    }
    
    public function toString()
    {
        //AU cas où il n'existe pas de critere de selection
        if(empty($this->sqcriterias))
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
            //var_dump($tempCriteria);
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
