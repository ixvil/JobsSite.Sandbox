<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{

    protected $fillable = ['title', 'description', 'email', 'status_id'];

    public function vacancyStatus()
    {
        return $this->belongsTo('App\VacancyStatus', 'status_id', 'id');
    }
}
