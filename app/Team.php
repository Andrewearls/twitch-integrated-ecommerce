<?php

namespace App;

use Mpociot\Teamwork\TeamworkTeam;

class Team extends TeamworkTeam
{
    /**
     * define the relationship with store resource.
     *
     * @return Collection App\Store
     */
    public function store()
    {
    	return $this->hasOne('App\Store');
    }
}
