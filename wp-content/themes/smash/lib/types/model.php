<?php
class Model {

  public function __construct($value = array()) {
    if(!empty($value))
        $this->hydrate($value);
  }

  public function hydrate($data) {
    foreach ($data as $attribute => $value) {
      $this->$attribute = $value;
    }
  }

}
