<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCompany extends Model
{
    use HasFactory;

    protected $table = 'product_companies';

    protected $primaryKey = 'id';

    protected $fillable = ['company_id','products','prod_desc'];

    public $timestamps = false;

    public function company(){
        return $this->belongsTo(Company::class);
    }
}
