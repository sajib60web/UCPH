<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FuelRate extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tblfuelrate';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'FId';
}
