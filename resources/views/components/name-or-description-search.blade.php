
<hr>

<div>    
    

  <h3>Name or Description Search</h3>

  {{-- The form below allows us to search in product name or description --}}
    <form action="/" method="get">
        <label >Search in product name or product description:</label>
        
        {{-- Below we take potential other requests and send them along, while hiding them from the user. --}}
        
        {{-- Including the current requests in our GET requests. 
          This allows the user to search over multiple criterias.
          We send along 'category', 'minPrice', 'maxPrice', 'earliestDate' and 'latestDate'. --}}
        <input type="hidden" id="hiddenInput"  name="category"      value="{{  request('category') }}">
        <input type="hidden" id="hiddenInput"  name="minPrice"      value="{{  request('minPrice') }}">
        <input type="hidden" id="hiddenInput"  name="maxPrice"      value="{{  request('maxPrice') }}">
        <input type="hidden" id="hiddenInput"  name="earliestDate"  value="{{  request('earliestDate') }}">
        <input type="hidden" id="hiddenInput"  name="latestDate"    value="{{  request('latestDate') }}">
        
        {{-- This is where the product request is inputted --}}
        <input type="text" name="product" value="{{ request('product') }}">
        {{-- The current request is shown by value="{{ request('product') }}" --}}
        
        <button type="submit">Search</button>
      </form>
      {{-- When we submit this form request we are taken to the route '/' at
        routes\web.php. Here we are taken to the index method in 
        "app\Http\Controllers\ProductController.php". This method returns the
        view at "resources\views\products\index.blade.php", which displays the component
        <x-display-filtered-products/>. This component receives the variable $products see 
        "app\View\Components\DisplayFilteredProducts.php". See comments in 
        "app\View\Components\DisplayFilteredProducts.php" for more information.  --}}
        

        {{-- Below we enable the user to reset the current product request  --}}
        </div>
        {{-- If there is a product request ...--}}
        @if (request('product'))
        {{-- Make a button ... --}}
        <button> 
          {{-- And send along all other requests to the route '/' --}}
          <a href="/?{{ http_build_query(request()->except('product')) }}" >
          Reset this search criteria
          </a> 
          {{-- This means that the product request is reset when the button is clicked. --}}

        </button>
        @endif

<hr>