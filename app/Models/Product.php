<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class Product extends Model
{
    protected $fillable = [
        'product_image',
        // 'product_sku',
        'product_upc',
        'product_name',
        'product_category',
        'product_weight',
        'product_variant',
        'packaging_type',
        'min_stock',
        'pdept',
    ];

    public function generateSKU()
    {
        // $product_name = "-".Session::get('product_name');

        $product_name = Session::get('product_name');
        $product_words = explode(' ', $product_name);

        $new_product_name = '';
        foreach ($product_words as $word) {
            $new_product_name .= $word[0];
        }

        $product_name = $new_product_name;
        $product_name = strtoupper($product_name);

        if (Session::get('product_weight')) {
            $product_weight = Session::get('product_weight');
            $product_weight = str_replace(' ', '', $product_weight);
            $product_weight = strtoupper($product_weight);
            $product_weight = substr($product_weight, 0, 3);
        } else {
            $product_weight = "";
        }

        if (Session::get('product_variant')) {
            $product_variant = Session::get('product_variant');
            $product_words = explode(' ', $product_variant);

            $new_product_variant = '';
            foreach ($product_words as $word) {
                $new_product_variant .= $word[0];
            }

            $first_three_letters = $new_product_variant;
            $product_variant = substr($first_three_letters, 0, 3);
            $product_variant = strtoupper($product_variant);
        } else {
            $product_variant = "";
        }

        $first_three_letters = Session::get('product_category');
        $product_category = substr($first_three_letters, 0, 3);
        $product_category = strtoupper($product_category);


        $currentDate = Carbon::now();
        $day = $currentDate->day;
        $month = $currentDate->month;
        $year = $currentDate->year;

        if ($month == 1) {
            $month = "JAN";
        } elseif ($month == 2) {
            $month = "FEB";
        } elseif ($month == 3) {
            $month = "MAR";
        } elseif ($month == 4) {
            $month = "APR";
        } elseif ($month == 5) {
            $month = "MAY";
        } elseif ($month == 6) {
            $month = "JUN";
        } elseif ($month == 7) {
            $month = "JUL";
        } elseif ($month == 8) {
            $month = "AUG";
        } elseif ($month == 9) {
            $month = "SEP";
        } elseif ($month == 10) {
            $month = "OCT";
        } elseif ($month == 11) {
            $month = "NOV";
        } elseif ($month == 12) {
            $month = "DEC";
        }
        
        $this->attributes['product_sku'] =$product_category.$product_name.$product_weight.$product_variant;
    }
        
}
