<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class UserService
{
    public function getAll($perPage = 6)
    {
        return DB::table('users')->orderBy('created_at', 'DESC')->paginate($perPage);
    }

    public function getOne($id)
    {
        return DB::table('users')->where('id', $id)->first();
    }

    public function search($search, $perPage = 6)
    {
        return DB::table('users')
            ->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('username', 'like', '%' . $search . '%')
                    ->orWhere('phone_number', 'like', '%' . $search . '%');
            })
            ->paginate($perPage);
    }

    public function store($data)
    {
        $data['password'] = bcrypt($data['password']);
        
        $data['created_at'] = now();
        $data['updated_at'] = now();
        $data['email_verified_at'] = now();

        $userId = DB::table('users')->insertGetId([
            'name' => $data['name'],
            'username' => $data['username'],
            'password' => $data['password'],
            'phone_number' => $data['phone_number'],
            'created_at' => $data['created_at'],
            'updated_at' => $data['updated_at'],
        ]);

        $user = $this->getOne($userId);

        return DB::table('model_has_roles')->insert([
            'role_id' => $data['role_id'],
            'model_type' => 'App\Models\User',
            'model_id' => $user->id,
        ]);
    }

    public function update($id, $data)
    {
        $data['updated_at'] = now();
        return DB::table('users')->where('id', $id)->update($data);
    }

    public function delete($id)
    {
        return DB::table('users')->where('id', $id)->delete();
    }
}
