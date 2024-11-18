<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class FertilizerDistributionService
{
    public function getAll($perPage)
    {
        return DB::table('fertilizer_distributions')->select('schools.name as school_name', 'fertilizer_distributions.*')
            ->join('schools', 'fertilizer_distributions.school_id', '=', 'schools.id')
            ->orderBy('fertilizer_distributions.created_at', 'DESC')
            ->paginate($perPage);
    }

    public function getOne($id)
    {
        return DB::table('fertilizer_distributions')->where('id', $id)->first();
    }

    public function search($search, $perPage = 6)
    {
        return DB::table('fertilizer_distributions')
            ->select('schools.name as school_name', 'fertilizer_distributions.*')
            ->join('schools', 'fertilizer_distributions.school_id', '=', 'schools.id')
            ->where(function ($query) use ($search) {
                $query->where('schools.name', 'like', '%' . $search . '%')
                    ->orWhere('fertilizer_distributions.school_id', 'like', '%' . $search . '%')
                    ->orWhere('fertilizer_distributions.pic', 'like', '%' . $search . '%')
                    ->orWhere('fertilizer_distributions.date', 'like', '%' . $search . '%')
                    ->orWhere('fertilizer_distributions.fertilizer_qty', 'like', '%' . $search . '%');
            })
            ->paginate($perPage);
    }


    public function store($data)
    {
        $data['created_at'] = now();
        $data['updated_at'] = now();

        return DB::table('fertilizer_distributions')->insert($data);
    }

    public function update($id, $data)
    {
        $data['updated_at'] = now();
        
        return DB::table('fertilizer_distributions')->where('id', $id)->update($data);
    }

    public function delete($id)
    {
        return DB::table('fertilizer_distributions')->where('id', $id)->delete();
    }
}
