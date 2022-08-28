<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tag extends Model
{
    use HasFactory;
    protected $table  = 'tags';
    protected $fillable = array('name');

    public function get_lists()
    {
        // with eloquent
        // --> $query = tag::paginate(5);

        // with Query builder
        $query = DB::table('tags')->paginate(5);
        return $query;
    }
}
