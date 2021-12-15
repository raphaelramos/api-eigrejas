<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = ['id'];

    public function groups()
    {
        return $this->hasMany(\App\Models\MembersRelationships::class, 'id')->where('members_relationships.type', '=', 'group');
    }
}
