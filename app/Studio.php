<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Studio extends Model
{
    /**
     * @var string
     */
    protected $table = 'studio';
    protected $primaryKey = 'id';
    public $incrementing = true;

    public function  ToJSONArray()
    {
        return
            [
                'id' => $this->id,
                'name' => $this->name,
                'address' => $this->address,
                'quality' => $this->quality,
            ];

    }

}
