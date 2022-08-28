<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = array('name');

    public function category()
    {
        return $this->belongsTo(User::class,'foreign_key','owner_key');
    }

    public function get_lists()
    {
        // with eloquent
        // --> $query = category::paginate(5);

        // with Query builder
        $query = DB::table('categories')->paginate(5);
        return $query;
    }
}


