<?php

namespace Neshaani\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Link extends Eloquent
{

	protected $table = 'links';
	protected $fillable = ['url', 'token'];

	public function generateToken()
	{
		return base_convert(($this->id + 100000), 10, 36);
	}

}