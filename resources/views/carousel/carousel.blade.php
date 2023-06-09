<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <title></title>

    <!-- Css -->
    <link rel="stylesheet" href="{{ asset('css/carousel.css') }}">


</head>
<body>

<div class="flex">
    <div id="indicators-carousel" class="bg-neutral-800 relative w-full carousel-c" data-carousel="static">
    <!-- <script src="{{asset('js/smoke.js')}}" type="module"></script> -->
        <!-- Carousel wrapper -->
        <div class="relative h-56 overflow-hidden rounded-lg md:h-96 carousle-container-c">
            <!-- Item 1 -->
            @foreach ($watch as $key => $slide)
            @if($slide->featured == 1)
            <a class="duration-700 ease-in-out carousel-item-c" data-carousel-item=" {{ $key == 0 ? ' active' : '' }}" href="{{ route('carousel.passId', ['index' => $key ]) }}">
                <img src="{{ asset($slide->image) }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                <div class="absolute bottom-0 left-0 right-0 text-white description">
                    <h2 class="text-2xl font-bold companyName-c">{{ $slide->serialName}}</h2> <!--watchName-->
                    <p class="mt-2 watchName-c">{{ $slide->company}}</p><!--companyName-->
                    <p class="mt-2 price-c">${{ $slide->price}}</p><!--price-->
                    <div class="description-bg"></div>
                </div>
            </a>
            @endif
            @endforeach
            
        </div>
        <!-- Slider indicators -->
        <div class="absolute z-30 flex space-x-3 -translate-x-1/2 left-1/2 carousel-indicator-c">
            @foreach ($watch as $key => $slide)
            @if($slide->featured == 1)
            <button type="button" class="w-3 h-3 rounded-full" {{ $key == 0 ? 'aria-current=true' : 'aria-current="false"' }} aria-label="Slide {{ $key + 1 }}" data-carousel-slide-to="{{ $key }}"></button>
            
            @endif
            @endforeach
        </div>
        <!-- Slider controls -->
        <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none btn-left" data-carousel-prev>
            <span>
                <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800 carousel-indicators-btn-c" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none btn-right" data-carousel-next>
            <span>
                <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800 carousel-indicators-btn-c" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>
</div>


</body>
</html>
