<?php

namespace Neshaani\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Link extends Eloquent
{

    protected $table = 'links';
    protected $fillable = ['url', 'token'];

    /*
    |--------------------------------------------------------------------------
    | This is how Neshaani handles token generation, feel free to modify it.
    |--------------------------------------------------------------------------
    */

    public function generateToken()
    {
        return base_convert(($this->id + 100000), 10, 36);
    }

}
