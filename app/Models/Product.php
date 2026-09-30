<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Product extends Model
    {
        protected $fillable = [
            'name',
            'sku',
            'price',
            'stock',
            'description',
            'active',
        ];
    
    
        protected function casts(): array
        {
            return [
                'price' => 'decimal:2',
                'stock' => 'integer',
                'active' => 'boolean',
            ];
        }
    }
