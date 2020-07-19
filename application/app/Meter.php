<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meter extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tblmeter';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'ID';

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'AcNo', 'AcNo');
    }
}
