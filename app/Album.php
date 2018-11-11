<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    /**
     * @var string
     */
    protected $table = 'album';
    protected $primaryKey = 'id';
    public $incrementing = true;

    public function  ToJSONArray()
    {
        return
            [
                'id' => $this->id,
                'name' => $this->name,
                'genre' => Genre::find($this->genre)->ToJsonArray(),
                'year' => $this->year,
                'artist' => Artist::find($this->artist)->ToJsonArray(),
            ];

    }

}
