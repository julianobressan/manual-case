<?php

namespace App\Modules\Products\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Common\Traits\HttpResponse;
use App\Modules\Products\Entities\Product;
use App\Modules\Products\Http\Resources\ProductResource;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    use HttpResponse;

    /**
     * Route: GET /products/
     * Gets all products
     * @return JsonResponse
     */
    public function get(): JsonResponse
    {
        $products = Product::all();
        return $this->success('Products listing.', 200, ProductResource::collection($products));
    }
}
