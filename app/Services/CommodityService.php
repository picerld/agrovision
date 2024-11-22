<?php

namespace App\Services;

use App\Helpers\ImageHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CommodityService
{
    public function getAll($perPage = 6)
    {
        return DB::table('commodities')->orderBy('created_at', 'DESC')->paginate($perPage);
    }

    public function getOne($id)
    {
        return DB::table('commodities')->where('id', $id)->first();
    }

    public function search($search, $perPage = 6)
    {
        return DB::table('commodities')
            ->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('harvest_date', 'like', '%' . $search . '%');
            })
            ->paginate($perPage);
    }

    public function store($data, $request)
    {
        if ($request->hasFile('image')) {
            $data['image'] = ImageHelper::handleImage($request->file('image'));
        }

        $data['created_at'] = now();
        $data['updated_at'] = now();

        return DB::table('commodities')->insert($data);
    }

    public function update($id, $data)
    {
        $data['updated_at'] = now();
        return DB::table('commodities')->where('id', $id)->update($data);
    }

    public function delete($id)
    {
        return DB::table('commodities')->where('id', $id)->delete();
    }

    public function deleteImage($image)
    {
        Storage::disk('public')->delete('commodities/' . $image);
    }

    public function updateImage($request, $id)
    {
        if ($request->hasFile('image')) {
            $this->deleteImage($this->getOne($id)->image);
        }

        return ImageHelper::handleImage($request->file('image'));
    }
}
