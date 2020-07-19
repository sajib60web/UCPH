<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tblrates';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'RtId';
}
