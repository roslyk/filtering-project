{{-- Our stylesheet --}}
<link rel="stylesheet" href="styles.css">

{{-- This page takes categories, $categories, and filtered products, $products, 
    from "app\View\Components\categoryDropdown.php" and "app\View\Components\DisplayFilteredProducts.php"
    and sends them to components <x-category-dropdown/> and <x-display-filtered-products/>.  --}}
<h2>Products Page</h2>

This is the page that displays all products. We may also filter products according to name or description, category, price and date added. 
<br>
<br>
{{-- Below is a link with a button that clears all search criteria --}}
<a href="/">
    <button>Clear All Search Criteria</button>
</a>
<br>

{{-- Search in name of description below --}}
{{-- At "resources\views\components\name-or-description-search.blade.php" --}}
<x-name-or-description-search/>

{{-- The Dropdown menu that lets us filter products by category --}}
{{-- At "resources\views\components\category-dropdown.blade.php"--}}
{{-- Receives categories, $categories, in "app\View\Components\categoryDropdown.php"  --}}
<x-category-dropdown/>

{{-- Below we can perform a price search --}}
{{-- At "resources\views\components\price-range-search.blade.php"--}}
<x-price-range-search/>

{{-- Search over when products are added --}}
{{-- At "resources\views\components\search-between-dates.blade.php" --}}
<x-search-between-dates/>



<br><br>

{{-- Displaying the filtered products --}}
{{-- At "resources\views\components\display-filtered-products.blade.php" --}}
{{-- Receives filtered products, $products, from "app\View\Components\DisplayFilteredProducts.php" --}}
<x-display-filtered-products/>