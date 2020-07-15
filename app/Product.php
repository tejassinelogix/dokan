<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    //
    use HasTranslations;
    public $translatable = ['product_name','product_short_description','product_full_discription'];

	protected $fillable = [

        'product_name', 'product_price','product_qty','product_short_description','product_full_discription','product_brand','product_images','product_sku','product_categories','created_by','created_by_name'

    ];

    public function product()
        {
            return $this->belongsTo('App\Blogsection');
        }

}
