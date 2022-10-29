<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sale extends Model
{
    use HasFactory;
    protected $table = 'sales';
    protected $fillable = array('order_date','region','item','sales_man','unit','unit_price','sale_amount');

    public function get_rekap()
    {
        // DB::select('select * from users where active = ?', [1]);
        $params = array(1);
        $query = DB::select('select * from sales where 1 = ?', $params);
        return $query;
    }

    public function get_lists()
    {
        // with eloquent
        // --> $query = Sale::paginate(5);

        // with Query builder
        $query = DB::table('sales')->paginate(15);
        return $query;
    }
}
