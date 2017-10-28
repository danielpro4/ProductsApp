<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;

/**
 * This is the product model.
 *
 * @author Daniel Pérez Atanacio<daniel@apagelab.io>
 * @package App
 */
class Product extends Model
{

    use Searchable;

    /**
     * VAT default value in percentage
     */
    const VAT = 16;

    /**
     * The validation rules.
     *
     * @var string[]
     */
    public static $rules = [
        'sku'          => 'required|unique:products|max:35',
        'name'         => 'required|string',
        'active'       => 'required|boolean',
        'sell_price'   => 'required|numeric',
        'buy_price'    => 'required|numeric',
        'category'     => 'required|string',
        'user_id'      => 'int',
    ];

    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = "products";

    /**
     * The fillable properties.
     *
     * @var string[]
     */
    protected $fillable = [
        'sku',
        'name',
        'suppliercode',
        'barcode',
        'description',
        'buy_price',
        'sell_price',
        'image',
        'category',
        'active',
        'existences',
        'user_id'
    ];

    /**
     * The searchable fields.
     *
     * @var string[]
     */
    protected $searchable = [
        'id',
        'sku',
        'name',
        'category',
        'active',
        'user_id',
        'created_at'
    ];

    /**
     * The sortable fields.
     *
     * @var string[]
     */
    protected $sortable = [
        'id',
        'sku',
        'name',
        'category',
        'active',
        'user_id',
        'created_at'
    ];

    /**
     * The properties that cannot be mass assigned.
     *
     * @var string[]
     */
    protected $guarded = [];

    /**
     * The attributes that should be casted to native types.
     *
     * @var string[]
     */
    protected $casts = [
        'user_id'     => 'int',
        'active'      => 'boolean',
        'created_at'  => 'datetime',
        'deleted_at'  => 'date',
        'sellingprice' => 'decimal'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'sellingprice',
        'sellingpricewithvat'
    ];

    /**
     * Gets Price Attribute
     *
     * @return number
     */
    public function getBuyingPriceAttribute()
    {
        return sprintf('$ %s', number_format($this->buy_price, 2));
    }

    /**
     * Gets Price Attribute
     *
     * @return number
     */
    public function getSellingPriceAttribute()
    {
        return sprintf('%s', number_format($this->sell_price, 2));
    }


    /**
     * Gets Price Sell price wirh Vat Attribute
     *
     * @return number
     */
    public function getSellingPriceWithVatAttribute()
    {
        $price = $this->sell_price * (1 + Product::VAT / 100); // 1 * 16/100 =

        $value = sprintf('%s', number_format($price, 2));

        return $value;
    }

    /**
     * Finds all visible incidents.
     *
     * @param Builder|\Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('active', '=', 1);
    }

    /**
     * Get the component relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Gets indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray():array {
        $array = $this->toArray();

        return $array;
    }
}
