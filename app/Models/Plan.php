<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Stancl\Tenancy\Database\Models\TenantPivot;
use Stancl\Tenancy\Database\Concerns\CentralConnection;

class Plan extends Model
{
    // Note that we force the central connection on this model
    use CentralConnection;

    protected $guarded = [];
    public $timestamps = false;
    public $table = 'plans';
}