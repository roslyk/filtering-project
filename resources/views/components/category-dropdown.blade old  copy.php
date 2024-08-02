    {{-- Standard Dropdown Menu --}}

@if (isset($currentCategory))
Current Category is: {{ $currentCategory->name  }}<br> <br>
@endif



   <button id="dropdownButton">Show Categories</button>

<div id="dropdownContent" style="display: none;">
    <form action="/" method="get">
        <label for="dropdown">Select a Category:</label>
        <select id="dropdown" name="category">
            <option value="">All Categories </option>
            @foreach ($categories as $category )
             <option value="{{ $category->slug}}">Category: {{$category->name}} </option>      
            @endforeach                     
        </select>
        <br><br>
        <button type="submit" value="Submit">Submit Category </button>
    </form>
</div>

<script>

document.getElementById("dropdownButton").addEventListener("click", function() {
    var dropdownContent = document.getElementById("dropdownContent");
    if (dropdownContent.style.display === "none" || dropdownContent.style.display === "") {
        dropdownContent.style.display = "block";
    } else {
        dropdownContent.style.display = "none";
    }
});


</script>
    
        {{-- <form id='categoryForm' action="/" method="GET">
        
            <label>Choose a category:</label>              
            <select value="" onchange="submitForm()">            
                <option value="?category="> All Categories</option> 
                @foreach ($categories as $category )             
                    @if ($category->slug == request('category'))
                        <option style="background: #dfe7ff;color:#e83541;" value="{{ $category->slug }}">
                            Category Name: {{ $category->name }}
                        </option>    
                    @else
                        <option value="{{ $category->slug }}">
                            Category Name: {{ $category->name }}
                        </option>     
                    @endif            
                @endforeach

            </select>
        </form>
    
        <script>
            function submitForm() {
              document.getElementById("categoryForm").submit();
            }
          </script> --}}

    