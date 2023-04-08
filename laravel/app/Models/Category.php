<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    public function getCategories(): \Illuminate\Support\Collection
    {
        return DB::table('categories')->get();
    }

    public function getCategoriesById(int $id)
    {
        return DB::table('categories')->find($id);
    }
}
