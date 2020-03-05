<?php

namespace App\Services\Cart\Facades;

use Illuminate\Support\Facades\Facade;

class Cart extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @method static \App\Services\Cart\Cart add($id, $name = null, $qty = null, $price = null, $weight = 0, array $options = [])
     * @method static \App\Services\Cart\Cart instance($instance = null)
     * @method static \App\Services\Cart\Cart currentInstance()
     * @method static \App\Services\Cart\Cart addCartItem($item, $keepDiscount = false, $keepTax = false, $dispatchEvent = true)
     * @method static \App\Services\Cart\Cart update($rowId, $qty)
     * @method static \App\Services\Cart\Cart remove($rowId)
     * @method static \App\Services\Cart\Cart get($rowId)
     * @method static \App\Services\Cart\Cart destroy()
     * @method static \App\Services\Cart\Cart content()
     * @method static \App\Services\Cart\Cart count()
     * @method static \App\Services\Cart\Cart countInstances()
     * @method static \App\Services\Cart\Cart totalFloat()
     * @method static \App\Services\Cart\Cart tax($decimals = null, $decimalPoint = null, $thousandSeperator = null)
     * @method static \App\Services\Cart\Cart subtotalFloat()
     * @method static \App\Services\Cart\Cart discountFloat()
     * @method static \App\Services\Cart\Cart discount()
     * @method static \App\Services\Cart\Cart initialFloat()
     * @method static \App\Services\Cart\Cart initial($decimals = null, $decimalPoint = null, $thousandSeperator = null)
     * @method static \App\Services\Cart\Cart priceTotalFloat()
     * @method static \App\Services\Cart\Cart priceTotal($decimals = null, $decimalPoint = null, $thousandSeperator = null)
     * @method static \App\Services\Cart\Cart weightFloat()
     * @method static \App\Services\Cart\Cart weight($decimals = null, $decimalPoint = null, $thousandSeperator = null)
     * @method static \App\Services\Cart\Cart search(\Closure $search)
     * @method static \App\Services\Cart\Cart associate($rowId, $model)
     * @method static \App\Services\Cart\Cart setTax($rowId, $taxRate)
     * @method static \App\Services\Cart\Cart setGlobalTax($taxRate)
     * @method static \App\Services\Cart\Cart setDiscount($rowId, $discount)
     * @method static \App\Services\Cart\Cart setGlobalDiscount($discount)
     * @method static \App\Services\Cart\Cart store($identifier)
     * @method static \App\Services\Cart\Cart restore($identifier)
     * @method static \App\Services\Cart\Cart erase($identifier)
     * @method static \App\Services\Cart\Cart merge($identifier, $keepDiscount = false, $keepTax = false, $dispatchAdd = true)
     *
     * @see \App\Services\Cart\Cart
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'cart';
    }
}
