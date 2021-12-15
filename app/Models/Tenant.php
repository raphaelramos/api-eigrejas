<?php

namespace App\Models;

use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;
use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\HasDatabase;
use Stancl\Tenancy\Database\Concerns\HasDomains;
use App\Models\CentralChurch;
use App\Models\Church;

class Tenant extends BaseTenant implements TenantWithDatabase
{
    use HasDatabase, HasDomains;

    public function churches()
    {
        return $this->belongsToMany(CentralChurch::class, 'tenant_churches', 'tenant_id', 'global_church_id', 'id', 'global_id')
            ->using(TenantPivot::class);
    }
}