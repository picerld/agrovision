<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class SeedDistributionService
{
    public function getAll()
    {
        return DB::table('seed_distributions')
            ->select('schools.name as school_name', 'seed_distributions.*', 'commodities.*')
            ->join('schools', 'seed_distributions.school_id', '=', 'schools.id')
            ->join('commodities', 'seed_distributions.type_of_seed', '=', 'commodities.id')
            ->orderBy('seed_distributions.created_at', 'DESC')
            ->get();
    }

    public function getOne($id)
    {
        return DB::table('seed_distributions')->where('id', $id)->first();
    }

    public function store($data)
    {
        $data['created_at'] = now();
        $data['updated_at'] = now();

        return DB::table('seed_distributions')->insert($data);
    }

    public function update($id, $data)
    {
        $data['updated_at'] = now();

        return DB::table('seed_distributions')->where('id', $id)->update($data);
    }

    public function delete($id)
    {
        return DB::table('seed_distributions')->where('id', $id)->delete();
    }
}
