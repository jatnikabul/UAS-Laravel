<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
        'description',
    ];

    public function images()
    {
        return $this->belongsToMany('App\Models\Image', 'product_images');
    }

    public function orderProducts($order_by){
        //secara default product akan di urutkan berdasarkan created_at
        $query='SELECT * FROM products ORDER BY created_at DESC';

        if($order_by=='best_seller')
        {
            //best seller
            // Untuk lebih lanjut bisa peljari  MYSQL
            //JOIN dan aggregation
            $query="select p.*, oi.quantity from products AS p left join(
                select product_id, sum(quantity) as quantity from order_items group by product_id)
                AS oi ON oi.product_id = p.id ORDER BY oi.quantity DESC;";
        }else if ($order_by == 'terbaik'){
            //terbaik
            //untuk lebih lanjut bisa pelajari MYSQL
            //JOIN DAN AGGRERAGATION

            //NOTE
            //anda harus mengubah query ini supaya bisa mengurutkan product berdasarkan rating tertinggi
            $query="SELECT*FROM products ORDER BY created_at DESC";
        }else if ($order_by=='termurah') {
            //termurah
            $query="SELECT * FROM products ORDER BY price ASC";
        }else if ($order_by=='termahal') {
            //termahal
            $query="SELECT * FROM products ORDER BY price DESC";
        }else if ($order_by == 'terbaru') {
            //terbaru
            $query="SELECT * FROM products ORDER BY created_at DESC";
        }

        return DB::select($query);
    }
}
