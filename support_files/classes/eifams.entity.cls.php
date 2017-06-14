<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Entity
 *
 * @author EI1
 */
class Entity {
  
  private $entity_string = '';
  
  public function setEntity_string($entity_string) {
    $this->entity_string = $entity_string;
  }
    
  protected function truncateTrailingCharacter(){
    return $this->entity_string = substr($this->entity_string,0,-1);	
  }
  
}
?>