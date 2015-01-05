<?php

class Demo extends Eloquent {

  protected $fillable = ['name', 'description'];

  protected $table = 'demos';

  /**
    * Demo belongs to user
    *
    * @return relationship
  **/
  public function users()
  {
    return $this->belongsToMany('User')->withPivot('Demo');
  }

  public function user()
  {
   return $this->belongsTo('User');
  }
}