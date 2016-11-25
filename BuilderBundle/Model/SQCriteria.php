<?php
namespace StructuredQuery\BuilderBundle\Model;

class SQCriteria {
    //put your code here
    //nom du parametre sur lequel se fera la recherche
    protected $parameter;
    
    //l'opération a réaliser sur le paramettre
    protected $operator;
    
    //la valeur cherchée
    protected $value;
    
    public function getParameter() 
    {
        return $this->parameter;
    }

    public function getOperator() 
    {
        return $this->operator;
    }

    public function getValue() 
    {
        return $this->value;
    }

    public function setParameter($parameter) 
    {
        $this->parameter = $parameter;
    }

    public function setOperator($operator) 
    {
        $this->operator = $operator;
    }

    public function setValue($value) 
    {
        $this->value = $value;
    }

    function toString()
    {
        return $this->parameter.''.$this->operator.''.$this->value;
    }
}
