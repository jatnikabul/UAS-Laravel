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

    public function categories()
    {
        return $this->belongsTo('App\Model\Category', 'category_id');
    }

    public function orderProducts($order_by){
        //secara default product akan di urutkan berdasarkan created_at
        $query='SELECT * FROM products ORDER BY created_at DESC';

        if($order_by=='best_seller')
        {
            //best seller
            // Untuk lebih lanjut bisa peljari  MYSQL
            //JOIN dan aggregation
            $query="SELECT p.*, oi.quantity from products AS p LEFT JOIN(
                SELECT product_id, SUM(quantity) as quantity from order_items GROUP BY product_id)
                AS oi ON oi.product_id = p.id ORDER BY oi.quantity DESC;";
        }else if ($order_by == 'terbaik'){
            //terbaik
            //untuk lebih lanjut bisa pelajari MYSQL
            //JOIN DAN AGGRERAGATION

            //NOTE
            //anda harus mengubah query ini supaya bisa mengurutkan product berdasarkan rating tertinggi
            $query="SELECT p.*, r.rating from products AS p LEFT JOIN(
                SELECT product_id, AVG(rating) as rating from product__reviews GROUP BY product_id)
                AS r ON r.product_id = p.id ORDER BY r.rating DESC;";
        }else if ($order_by=='termurah') {
            //termurah
            $query="SELECT * FROM products ORDER BY price ASC";
        }else if ($order_by=='termahal') {
            //termahal
            $query="SELECT * FROM products ORDER BY price DESC";
        }else if ($order_by == 'terbaru') {
            //terbaru
            $query="SELECT * FROM products ORDER BY created_at DESC";
        }else if ($order_by == 'dell') {
            $query="SELECT * FROM products WHERE category_id=1";
        }else if ($order_by == 'asus') {
            $query="SELECT * FROM products WHERE category_id=2";
        }else if ($order_by == 'acer') {
            $query="SELECT * FROM products WHERE category_id=3";
        }else if ($order_by == 'hp') {
            $query="SELECT * FROM products WHERE category_id=5";
        }else if ($order_by == 'lenovo') {
            $query="SELECT * FROM products WHERE category_id=6";
        }


        return DB::select($query);
    }
}
