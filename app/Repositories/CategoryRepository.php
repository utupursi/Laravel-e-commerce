<?php

namespace App\Repositories;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductResource;
use App\Interfaces\CategoryInterface;
use App\Interfaces\ProductInterface;
use App\Models\Category;
use App\Models\Product;
use App\Traits\ResponseAPI;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class CategoryRepository implements CategoryInterface
{
    // Use ResponseAPI Trait in this repository
    use ResponseAPI;

    public function getCategories()
    {
        try {
            $categories = Category::with('availableLanguage')->get();
            $resource = new CategoryResource($categories);

            return $this->success("All Products", $categories, $resource);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

}
