<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherTaxDetail extends Model
{
    use HasFactory;
    protected $table ="other_tax_details";

    protected $casts = [
        'created_by' => 'object',
        'updated_by' => 'object',
    ];
}
