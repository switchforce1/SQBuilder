<?php
namespace StructuredQuery\BuilderBundle\Model;

class SQBuilder {
    
    /**
     * Transform the array resquet into string request
     * 
     * @param array  $request
     * @return string 
     */
    public function getStringRequest( $request)
    {
            //Initialisation de la chaine de caractère à retourner
            $stringRequest = "";
            
            //Au cas où le cparamettre entré n'est pas un tableau 
            if (!is_array($request))
            {
                    //on return null
                    return null;
            }    

            $stringRequest .= "(";
            foreach ($request as $key => $value)
            {
                    if($key == 'coordinator' ) 
                    {
                            $coordinateur = $value;
                    }
                    elseif ($key == 'conditions') 
                    {

                    }    
            }  
            
            $stringRequest .= ")";
    }  
    
    /**
     * retur the inner array of a given array
     * 
     * @param array $hoverArray
     * @return array 
     */
    public function getInnerArray($hoverArray)
    {
            //check if parram if array
            if((!(is_array($hoverArray)))or empty($hoverArray))
            {
                    return null;
            }
            
            //check if param have array inside
            if(!(is_array($innerArray = $hoverArray['conditions'])))
            {
                    return null;
            }
            else
            {       //check if the array inside empty/null  
                    if(empty($innerArray))
                    {
                            return null;
                    }
                    //when the inner array is not null 
                    else 
                    {
                            return $innerArray;
                    }
            }    
            return null;           
    }   
    
    /**
     * transforme array's final params into string 
     * 
     * @param type $conditionsArray
     * @return string
     */
    public function getFinalParams($conditionsArray)
    {
            $stringRequest = "";
            if((!is_array($conditionsArray))or empty($conditionsArray))
            {
                    return "";
            }    
            $count = 0;
            $stringRequest .= "(";
            foreach ($conditionsArray['conditions'] as $key => $value)
            {
                    //si nous renntrons dans la boucle plus d'une fois
                    if($count > 0 )
                    {
                            //On ajoute une coordination entre le dernier et le suivant 
                            $stringRequest .= ' '.$conditionsArray['coordinator'].' ';
                    }
                    
                    //Vifify if the value is not an array 
                    if(!is_array($value))
                    {       //add the condition to the string
                            $stringRequest .= $value;
                            $count ++;
                    }                                        
            }              
            $stringRequest .= ")";     
            return $stringRequest;
    }        
     
}
