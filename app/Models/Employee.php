<?php

namespace App\Models;

use App\Models\Companies;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;
    protected $table="employees";
    protected $guarded = [];
    protected $timestamp = true;

    public function companies(){
        return $this->belongsTo(Companies::class, 'company_id','id');
    }
}
