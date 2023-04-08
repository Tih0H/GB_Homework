<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Source extends Model
{
    use HasFactory;

    public function getNews()
    {
        return DB::table('sources')->orderBy('id')
            ->get();;
    }

    public function getNewsById(int $id)
    {
        return DB::table('sources')->find($id);
    }
}
