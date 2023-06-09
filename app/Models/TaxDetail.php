<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxDetail extends Model
{
    use HasFactory;
    protected $table ="Tax_Details";

    protected $casts = [
        'created_by' => 'object',
        'updated_by' => 'object',
    ];
}
