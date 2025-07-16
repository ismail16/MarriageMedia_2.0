<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use App\Models\Admin\Product;
use Illuminate\Support\Facades\Gate;

class StoreMiddleware
{
    use ApiResponser;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    
    public function handle(Request $request, Closure $next)
    {
        $current_path = \Request::route()->getName();
        // for product
        if($current_path == 'admin.product.store' || $current_path == 'admin.product.update'){
            if(isset($request->type) && strtolower($request->type) != 'digital' && Gate::allows('isDigital')){
                return $this->errorResponse("Sorry You have Digital Store!");
            }
            else if(isset($request->type) && strtolower($request->type) == 'digital' && Gate::denies('isDigital')){
                return $this->errorResponse("Sorry You have a Physical Store!");
            }
        }
        // for cart
        else if($current_path == 'client.cart.store' || $current_path == 'client.cart.delete'){
            if(isset($request->product_id)){
                $product = Product::findOrFail($request->product_id);
                if(isset($product->type) && strtolower($product->type) != 'digital' && Gate::allows('isDigital')){
                    return $this->errorResponse("Sorry You have Digital Store!");
                }
                else if(isset($product->type) && strtolower($product->type) == 'digital' && Gate::denies('isDigital')){
                    return $this->errorResponse("Sorry You have a Physical Store!");
                }
            }
        }
        else{
            if(Gate::allows('isDigital'))
                return $this->errorResponse("Sorry You have Digital Store!");
        }
        return $next($request);
    }
}
