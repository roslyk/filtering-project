<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Loading the products category when 
    // we load a product instance 
    // from the database. This means 
    // that we only have to access the database once, 
    // when displaying a product at
    // "resources\views\components\display-filtered-products.blade.php".
    protected $with="category";

    
    public function category(){

        return $this->belongsTo(Category::class);

    }


    public function scopeFilter( $query, array $filters ){

    // 'when'? See file in this folder 
    // "app\Models\The when function used in Post - assuming that  $query is an instance of BuildQueries.png"      

    // When there is a product search then the callback below "  fn($query, $product) =>  ..."
    // is applied to $query (suvh as Post::latest()) and the search term which is stored in $product. 
    // If $filters['product'] is null then the original query is returned - see definition of 'when' . 
    $query->when($filters['product'] ?? null,
                    fn($query, $product) => 
                    // Finding the posts where name is like $product or description is like
                    // $product.
                    // We put both the name and description search inside a 'where' method.
                    // This move tells SQL that the two conditions should be seen as one 
                    // condition/the conditions should be surrounded by parentheses 
                    // and seen as one. 
                    $query->where(fn($query) => $query->
                                    where('name','LIKE', '%'. $product .'%' )
                                    ->orWhere('description','LIKE', '%'.$product.'%') )
        );

    $query->when(

                $filters['category'] ?? null, 
            // If $filters['category'] is null then the original query is returned.
            // If $filters['category'] is not null then the callback below is 
            // applied to the $query and the $category, which stores the search term,
            fn($query, $category) => 
            // $category is the slug of one of the categories

            // Finding the product that have a category and where the slug is equal to
            // $category.
            $query->whereHas('category', fn($query) => $query->where('slug',$category) )
        
        
        );


    // If $filters['minPrice'] is not null then $minPrice is assigned to $minPrice
    // and the callback below is applied to the query and $minPrice.
    // If $filters['minPrice'] is null then the original query is returned.
    $query->when($filters['minPrice'] ?? null,
                    fn($query, $minPrice) => 
                        // Finding the products that have a price greater than $minPrice
                        $query->where('price', '>=', $minPrice)
        );

    // Much the same as above
    $query->when($filters['maxPrice'] ?? null,
                    fn($query, $maxPrice) => 
                        $query->where('price', '<=', $maxPrice) 

        );

    // Much the same as above
    $query->when($filters['earliestDate'] ?? null,
                fn($query, $earliestDate) => $query->where('date_added', '>=', $earliestDate ) 
        );

    // Much the same as above
    $query->when($filters['latestDate'] ?? null,
                fn($query, $latestDate) => $query->where('date_added', '<=', $latestDate ) 
        );










    }
}
