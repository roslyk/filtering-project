{{-- Quite similar to <x-name-or-description-search/> --}}

<div>

    <hr>  
    <h3>Date Search</h3>
       Date format in products display: yyyy-mm-dd
      <br><br>
      <form action="/" method="get">
        <input type="hidden" id="hiddenInput"   name="product"          value="{{  request('product') }}">

        <input type="hidden" id="hiddenInput"   name="category"         value="{{  request('category') }}">
        
        <input type="hidden" id="hiddenInput"   name="minPrice"          value="{{  request('minPrice') }}">

        <input type="hidden" id="hiddenInput"   name="maxPrice"         value="{{  request('maxPrice') }}">
        
      
         
        
        
        <label for="earliestDate">Earliest Date:</label>
        <input type="date" id="earliestDate" name="earliestDate"  value="{{ request('earliestDate') }}" optional><br><br>
      
          @if (request('earliestDate'))
              <button>  
          
                <a href="/?{{ http_build_query(request()->except('earliestDate')) }}" >
                Reset earliest date
                </a> 

              </button>
              <br> <br> 
          @endif


        <label for="latestDate">Latest Date:</label>
        <input type="date" id="latestDate" name="latestDate" value="{{ request('latestDate') }}" optional><br><br>
      
          @if (request('latestDate'))
            <button>  
        
              <a href="/?{{ http_build_query(request()->except('latestDate')) }}" >
              Reset latest date
              </a> 

            </button>
          <br> <br> 
          @endif



        <input type="submit" value="Submit">
      </form>
    
    <hr>


</div>