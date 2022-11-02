<?php

namespace App\Models;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $primaryKey = 'id';
    protected $fillable = array('category_id','title','body','image','author');
    protected $guarded = [];

    public function archives()
    {
        $query = $this->selectRaw(" DATE_FORMAT(created_at, '%M %Y') as created, count(1) as total")
        ->groupBy("created")
        ->get();
        return $query;
    }

    public function articles()
    {
        $query = Post::selectRaw('*,
        (select name from categories where id = category_id) as categori')->paginate(5);
        return $query;
    }

    public function get_lists()
    {
        // with eloquent
        // --> $query = post::paginate(5);

        // with Query builder
        $query = DB::table('posts')->paginate(5);
        return $query;
    }
}
