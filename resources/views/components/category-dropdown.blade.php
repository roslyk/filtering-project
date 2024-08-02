{{-- Variables $categories and $currentCategory is sent along to this component.
     See "app\View\Components\categoryDropdown.php". --}}

{{-- This is the dropdown menu where one can see all categories and pick the one they want --}}
<div class="dropdown">
    <button onclick="toggleDropdown()" class="dropbtn"><h3>Category Search</h3></button>
    <div id="myDropdown" class="dropdown-content">
        <div class="dropdown-links">
            {{--  Looping over all categories in order to  display categories
              in a dropdown menu --}}
            @foreach ($categories as $category )
            
            {{-- If the categories slug is the same as current category's slug - used as the search term -
             then the name of the category is blue --}}
             {{-- The slug is simply used as an identifier for a category. 
              Each category-slug is different from other category-slugs --}}
            @if ($category->slug == request('category'))
            {{-- The link below allows us to search for the current category and it allows us to
              search for a given category along with the other requests --}}
              <a href="/?category={{ $category->slug }}&{{ http_build_query(request()->except('category')) }}" 
                style="color:blue"  >
                Category: {{ $category->name}}
              </a> 
            @else
              <a href="/?category={{ $category->slug }}&{{ http_build_query(request()->except('category')) }}"
                style="color:grey">
                Category: {{ $category->name}}
              </a> 
            @endif

            <br>  
            
            @endforeach
    
            
            <!-- Add more items as needed -->
        </div>
       
    </div>  


    <script>

    function toggleDropdown() {
      var dropdownLinks = document.querySelector('.dropdown-links');
      dropdownLinks.style.display = dropdownLinks.style.display === 'none' ? 'block' : 'none';
    }

    </script>
 </div> 
    
    {{-- If a current category is set/there is a 'category' request --}}      
    @if ($currentCategory)
    <br><br>
    {{-- show the category --}}
        Current category is: {{ $currentCategory->name }}           
        <br><br>
        {{-- You may reset the category filter --}}
          <button>
            {{-- By searching for all requests except the 'category' request --}}
            <a href="/?{{ http_build_query(request()->except('category')) }}" 
            style="color: white">
            Clear Current Category
            </a> 
          </button>

        
    @endif