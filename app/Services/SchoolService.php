<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class SchoolService
{
    public function getAll($perPage = 5)
    {
        return DB::table('schools')->orderBy('created_at', 'ASC')->paginate($perPage);
    }

    public function getOne($id)
    {
        return DB::table('schools')->where('id', $id)->first();
    }

    public function search($search, $perPage = 6)
    {
        return DB::table('schools')
            ->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('pic', 'like', '%' . $search . '%')
                    ->orWhere('address', 'like', '%' . $search . '%')
                    ->orWhere('phone_number', 'like', '%' . $search . '%');
            })
            ->paginate($perPage);
    }

    public function store($data)
    {
        $data['created_at'] = now();
        $data['updated_at'] = now();

        return DB::table('schools')->insert($data);
    }

    public function update($id, $data)
    {
        $data['updated_at'] = now();
        return DB::table('schools')->where('id', $id)->update($data);
    }

    public function delete($id)
    {
        return DB::table('schools')->where('id', $id)->delete();
    }
}
