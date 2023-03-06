<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CentralChurch;
use App\Models\Tenant;

class Church extends Model
{
    protected $guarded = [];

    public function getGlobalIdentifierKey()
    {
        return $this->getAttribute($this->getGlobalIdentifierKeyName());
    }

    public function getGlobalIdentifierKeyName(): string
    {
        return 'global_id';
    }

    public function getCentralModelName(): string
    {
        return CentralChurch::class;
    }
}