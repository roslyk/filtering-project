<div>

    <hr>  
  <h3>Price Range Search</h3>

  {{-- The form below allows us to narrow our search to some price range --}}

  {{-- Both inputs, minimum price and maximum price, are optional --}}
      <form action="/" method="get">

        {{-- We allow for hidden inputs in our form so that we can search through other filters
            if such filters are set/if there are other search requests --}}

        {{--The hidden inputs are, 'product' (from name or description search), 'category', 'earliestDate', 
            and 'latestDate', requests   --}}

        {{-- Upon submission of this form the hidden inputs are sent along as well. They are sent along
          via the route '/'. --}}
        <input type="hidden" id="hiddenInput"   name="product"          value="{{  request('product') }}">

        <input type="hidden" id="hiddenInput"   name="category"         value="{{  request('category') }}">

        <label for="minPrice">Minimum Price:</label>
        {{-- Inputting minimum price and setting the current value to the 'minPrice' request
             (if exists other wise empty) --}}
        <input type="number" id="minPrice"      name="minPrice"         value="{{ request('minPrice') }}" optional><br><br>
                
                {{-- If 'minPrice' request is set then allow user to reset the minimum price.
                     This enables the user to remove the minimum price search criteria. --}}
                @if (request('minPrice'))
                  
                {{-- Push the button below to search for everything except the current 'minPrice' request
                     --}}
                  <button>  
                      
                      {{-- We reset minimum prices by searching for all requests except 'minPrice' request --}}
                      <a href="/?{{ http_build_query(request()->except('minPrice')) }}" >
                      Reset minimum price
                      </a> 

                  </button>
                    <br> <br> 
              @endif
             
        <label for="maxPrice">Maximum Price:</label>
        {{-- Same as above but for the maximum price instead --}}
        <input type="number" id="maxPrice"      name="maxPrice"         value="{{ request('maxPrice') }}" optional><br><br>
                  @if (request('maxPrice'))
                      <button>  
                  
                        <a href="/?{{ http_build_query(request()->except('maxPrice')) }}" >
                        Reset maximum price
                        </a> 

                      </button>
                      <br> <br> 
                  @endif

      
        <input type="hidden" id="hiddenInput"   name="earliestDate"     value="{{  request('earliestDate') }}">

        <input type="hidden" id="hiddenInput"   name="latestDate"       value="{{  request('latestDate') }}">


         
        <input type="submit" value="Submit" >
      </form>



    



</div>