<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sale;
use Illuminate\Support\Facades\DB;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $region = array(1=>'East',2=>'Central',3=>'West');
        $order  = array(1=>'2020-03-13',2=>'2020-03-14',3=>'2020-03-15');
        $x=0;
        $i=0;
        while ($i < 100) {
            $x++;
            $params = array(
                'order_date' => $order[$x],
                'region' => $region[$x],
                'item'   => 'Item Sale '.$i,
                'sales_man' => 'Sales Man '.$x,
                'unit'   => (4000 * $x),
                'created_at' => date('Y-m-d H:i:s')
            );
            DB::table('sales')->insert($params);

            if($x == 3){
                $x=0;
            }
            $i++;
        }
    }
}
