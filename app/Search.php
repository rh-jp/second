<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    
 use SearchableTrait;

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        'columns' => [
            'domains.id' => 10,
            'domains.name' => 10,
            'domains.vspid' => 10,
            'domains.note' => 2,
            'domains.status' => 5,
            'posts.title' => 2,
            'posts.body' => 1,
        ],
        'joins' => [
            'posts' => ['domains.id','posts.user_id'],
        ],
    ];

    public function posts()
    {
        return $this->hasMany('Post');
    }

}