<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Product;

class DisplayFilteredProducts extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.display-filtered-products',
        ['products' => Product::latest()->filter(request(['category','product','minPrice',
                                                            'maxPrice','earliestDate','latestDate']))->
                                                                                                        get()]);
    }
    //Here the query, Product::latest(), and the (possibly empty) request array 
    // request(['category','product','minPrice','maxPrice','earliestDate','latestDate'])
    // is sent to the method "scopeFilter" in "app\Models\Product.php". The query,
    // Product::latest() is stored as $query and the request array is stored as
    // $filters. Too see more comments go to the method 'scopeFilter' in 
    // "app\Models\Product.php". 
}
