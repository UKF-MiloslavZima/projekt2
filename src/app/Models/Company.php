<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name',
        'city',
        'street',
        'house_number',
        'zip_code',
        'phone',
        'email'
    ];
    protected $guarded = ['id'];

    public function departments()
    {
        return $this->belongsToMany(Department::class)->using(CompanyDepartment::class);
    }
    public function companyEmployees() :HasMany
    {
        return $this->hasMany(CompanyEmployee::class,'company_id');
    }
    public function practiceOffers()
    {
        return $this->hasManyThrough(PracticeOffer::class, CompanyDepartment::class,"company_id","company_department_id","id","id");
    }

}
