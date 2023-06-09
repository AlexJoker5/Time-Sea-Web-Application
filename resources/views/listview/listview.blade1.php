
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    <!-- Css -->
    <link rel="stylesheet" href="{{ asset('css/listview.css') }}">
    
    

</head>
<body>
@php
use App\Http\Controllers\ListviewController;

$listviewController = new ListviewController();
$result = $listviewController->split_category($watch);

$col_index_recommend = $result['col_index_recommend'];
$col_index_new_arrival = $result['col_index_new_arrival'];
$col_index_bestseller = $result['col_index_bestseller'];
$col_index_on_sale = $result['col_index_on_sale'];
@endphp
<div id="indicators-carousel" class="relative w-full h-auto carousel-l" data-carousel="static">
    <!-- Carousel wrapper -->
    <div class="relative h-56 overflow-hidden rounded-lg carousel-item-l">
         <!-- Item 1 -->
        <div id="slide1" class="hidden duration-700 ease-in-out" data-carousel-item="active">
        @php
        $listviewController->listview($col_index_recommend, $watch);
        @endphp
        </div>
        <!-- Item 2 -->
        <div id="slide2" class="hidden duration-700 ease-in-out" data-carousel-item>
        @php
        $listviewController->listview($col_index_new_arrival, $watch);
      @endphp

        </div>
        <!-- Item 3 -->
        <div id="slide3" class="hidden duration-700 ease-in-out" data-carousel-item>
        @php
          $listviewController->listview($col_index_bestseller, $watch);
          @endphp
        </div>
        <!-- Item 4 -->
        <div id="slide4" class="hidden duration-700 ease-in-out" data-carousel-item>
        @php
        $listviewController->listview($col_index_on_sale, $watch);
        @endphp
        </div>
      
    </div>
    <!-- Slider indicators -->
    <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2 carousel-indicators-l">
        <button type="button" class="w-24 h-8" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0">
          Recommend
        </button>
        <button type="button" class="w-24 h-8" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1">
          NewArrivals
        </button>
        <button type="button" class="w-24 h-8" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2">
          BestSeller
        </button>
        <button type="button" class="w-24 h-8" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3">
          OnSale
        </button>

    </div>
    
</div>



</body>
</html>