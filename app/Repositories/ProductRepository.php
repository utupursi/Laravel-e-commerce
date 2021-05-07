<?php

namespace App\Repositories;

use App\Http\Resources\ProductResource;
use App\Interfaces\ProductInterface;
use App\Models\Product;
use App\Traits\ResponseAPI;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class ProductRepository implements ProductInterface
{
    // Use ResponseAPI Trait in this repository
    use ResponseAPI;

//    public $productResource;
//
//    public function __construct(ProductResource $productResource)
//    {
//        $this->productResource = $productResource;
//    }

    public function getAllProducts()
    {
        try {
            $products = Product::with(['category' => function ($query) {
                $query->with('availableLanguage');
            }])->with('availableLanguage')->with('files')->orderBy('created_at', 'desc')->take(10)->get();

            $resource = new ProductResource($products);
//            $resource=ProductResource::collection($products);
            return $this->success("All Products", $products, $resource);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function getDiscountedProducts()
    {
        try {
            $products = Product::with(['category' => function ($query) {
                $query->with('availableLanguage');
            }])->with('availableLanguage')->with('files')
                ->where([
                    ['sale', '!=', "null"],
                    ['sale', '!=', ""],
                    ['sale_price', '!=', "null"],
                    ['sale_price', '!=', ""]
                ])
                ->take(10)->get();

            $resource = new ProductResource($products);
//            $resource=ProductResource::collection($products);
            return $this->success("All Products", $products, $resource);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function getProductById($id)
    {
        try {
            $user = Product::find($id);

            // Check the user
            if (!$user) return $this->error("No user with ID $id", 404);

            return $this->success("User Detail", $user);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }


}
