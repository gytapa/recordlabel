<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    /**
     * @var string
     */
    protected $table = 'song';
    protected $primaryKey = 'id';
    public $incrementing = true;

    public function  ToJSONArray()
    {
        return
            [
                'id'     => $this->id,
                'name'   => $this->name,
                'genre'  => Genre::find($this->genre)->ToJsonArray(),
                'artist' => Artist::find($this->artist)->ToJsonArray(),
                'album'  => Album::find($this->album)->ToJsonArray(),
                'year'   => $this->year,
            ];

    }

    public static function exists($id)
    {
        $song = Song::where('id','=',$id);
        if ($song === null)
            return false;
        else
            return true;
    }

}
