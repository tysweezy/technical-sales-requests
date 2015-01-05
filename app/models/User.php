<?php

use Zizaco\Confide\ConfideUser;
use Zizaco\Confide\ConfideUserInterface;
use Zizaco\Entrust\HasRole;

class User extends Eloquent implements ConfideUserInterface {

  use ConfideUser;
  use HasRole;


  /**
    * many-to many relationship // user has many demos
    *
    * @return relationship
   **/
  public function demos()
  {
  	return $this->belongsToMany('Demo');
  }
}