<?php

namespace App\Models;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Companies extends Model
{
    use HasFactory;
    protected $table="companies";
    protected $guarded = [];
    protected $timestamp = true;

    public function employees(){
        return $this->hasMany(Employee::class, 'id','company_id');
    }
}
