<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{



    public function attachment()
    {
        return $this->morphTo();
    }
}
