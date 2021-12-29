<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demo extends Model
{
    public function AddCart(){
        $newTime = Carbon::now();
        $this->date = $newTime;

    }

}
