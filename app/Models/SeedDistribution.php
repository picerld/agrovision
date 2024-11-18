<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeedDistribution extends Model
{
    /** @use HasFactory<\Database\Factories\SeedDistributionFactory> */
    use HasFactory;

    public $table = 'seed_distributions';

    protected $guarded = ['id'];

    protected $casts = [
        'date' => 'datetime',
    ];
}
