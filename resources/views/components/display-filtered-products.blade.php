{{-- This component takes $products from 'app\View\Components\DisplayFilteredProducts.php'  --}}

{{-- This file simply displays all products --}}
<div>
    @foreach( $products as $product)

    <b>Product name:</b> <br>
    {{ $product->name }} <br>
    <b>Product category:</b> <br>
    {{  $product->category->name }} <br>
    <b>Product description:</b> <br>
    {{  $product->description }} <br>
    <b>Product price:</b> <br>
    {{ $product->price }} <br>
    <b>Date added:</b> <br>
    {{ $product->date_added }} <br>
    <br><br>
    
    @endforeach
</div>