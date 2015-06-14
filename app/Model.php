<?php namespace ThreeOh;

class Model extends \Illuminate\Database\Eloquent\Model
{
    public function creator()
    {
        return $this->belongsTo('ThreeOh\User', 'created_by', 'id');
    }

    public function updater()
    {
        return $this->belongsTo('ThreeOh\User', 'updated_by', 'id');
    }
}