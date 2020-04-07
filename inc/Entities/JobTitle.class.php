<?php

class JobTitle{

    
    private $JobTitleId;
    private $JobTitleName;
    
    
    public function setJobTitleId(int $JobTitleId){
        
        $this->JobTitleId= $JobTitleId;
    }
public function setJobtitleName(string $JobTitleName){
    $this->JobTitleName=$JobTitleName;


}

    
public function getJobTitleId():int{
        
    return $this->JobTitleId;
}
public function getJobtitleName():string{
return $this->JobTitleName;


}
    
    
    
    
    
    
}
















?>