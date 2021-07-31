<?php

namespace App\Observers;

use App\Models\Product;

class ProductObserver
{

/**
* Handle the  "created" event.
*
* @param \App\Models\Product $product
* @return void
*/
public function creating(Product $product)
{
$product->slug = \Str::slug($product->name);
}

/**
* Handle the  "created" event.
*
* @param \App\Models\Product $product
* @return void
*/
public function created(Product $product)
{
$product->unique_id = 'MAC-'.$product->id;

$product->save();
}

/**
* Handle the  "updated" event.
*
* @param \App\Models\Product $product
* @return void
*/
public function updated(Product $product)
{

}

/**
* Handle the  "deleted" event.
*
* @param \App\Models\Product $product
* @return void
*/
public function deleted(Product $product)
{

}

/**
* Handle the  "restored" event.
*
* @param \App\Models\Product $product
* @return void
*/
public function restored(Product $product)
{

}

/**
* Handle the  "force deleted" event.
*
* @param \App\Models\Product $product
* @return void
*/
public function forceDeleted(Product $product)
{

}
}