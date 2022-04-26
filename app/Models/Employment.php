<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employment extends Model
{
    use HasFactory;

    public function startYearHuman()
    {
        /**
         * Get the year this employment
         * was started in a human readable
         * format
         */
        return date('Y',strtotime($this->start_date));
    }

    public function endYearHuman()
    {
        /**
         * Get the year this employment
         * was started in a human readable
         * format
         */
        return $this->end_date ? date('Y',strtotime($this->end_date)) : "";
    }

}
