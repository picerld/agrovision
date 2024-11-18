<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FertilizerDistribution extends Model
{
    /** @use HasFactory<\Database\Factories\FertilizerDistributionFactory> */
    use HasFactory;

    protected $table = 'fertilizer_distributions';

    protected $guarded = ['id'];

    protected $casts = [
        'date' => 'datetime',
    ];
    

}
