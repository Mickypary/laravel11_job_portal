<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Company;
use App\Models\Package;

class order extends Model
{
    use HasFactory;

    public function rCompany()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function rPackage()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }
}
