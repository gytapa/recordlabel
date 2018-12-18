<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    /**
     * @var string
     */
    protected $table = 'artists';
    protected $primaryKey = 'id';
    public $incrementing = true;

public function  ToJSONArray()
{
    return
        [
            'id' => $this->id,
            'name' => $this->name,
            'genre' => Genre::find($this->genre)->ToJsonArray(),
            'gender' =>
                [
                    'id' => $this->gender,
                    'name' => ($this->gender == 0 ? "MALE" : "FEMALE")
                ],
        ];
}
    public static function exists($id)
    {
        $artist = Artist::where('id','=',$id);
        if ($artist === null)
            return false;
        else
            return true;
    }

}
