<x-app-layout>
    
    @include('carousel.carousel', ['watch' => $watch])
    @include('listview.listview',['category' => 'recommend'])

</x-app-layout>

