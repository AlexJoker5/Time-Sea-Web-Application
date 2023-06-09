

<div class="bg-neutral-800">
  <div class="mx-auto max-w-2xl px-4 py-8 sm:px-6 sm:py-8 lg:max-w-7xl lg:px-8">

    <div class="flex justify-center pb-8">
      <button id="recommend" class="bg-gray-100 mx-3 hover:bg-gray-100 text-gray-800 hover:text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow" onClick="getItems(`recommend`)">Recommended</button>
      <button id="new_arrival" class="bg-none mx-3 hover:bg-gray-100 text-white hover:text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow" onClick="getItems(`new_arrival`)">New Arrival</button>
      <button id="bestseller" class="bg-none mx-3 hover:bg-gray-100 text-white hover:text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow" onClick="getItems(`bestseller`)">Bestseller</button>
      <button id="on_sale" class="bg-none mx-3 hover:bg-gray-100 text-white hover:text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow" onClick="getItems(`on_sale`)">On Sale</button>
    </div>

    <div id="productList" class="pt-8 ease-in-out grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
      @foreach($watches as $wat)
        <a class="group">
          <div onclick="window.location.href= `{{ route('carousel.passId', ['index' => $wat->id-1 ]) }}`" class="translation-transform translate-x-0 group hover:scale-110 transition ease-in-out delay-120 aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
            <img src="{{  asset($wat->image)  }}" alt="watch image" class="cursor-pointer h-full w-full object-cover object-center group-hover:opacity-75">
          </div>
          <h3 class="mt-4 text-center text-sm text-gray-100"> {{ $wat->serialName }}</h3>
          <p class="mt-1 text-center text-lg font-medium text-gray-100"> {{ $wat->company }}</p>
        </a>
      @endforeach

      <!-- More products... -->
    </div>
  </div>
</div>
<script>
  function getItems(category){
    categories = ["recommend", "new_arrival", "bestseller", "on_sale"];
    categories.forEach(results => {
      console.log("results : ", results);
      console.log("category : ", category);
      var documentItem = document.getElementById(results);
      if(results == category){
        console.log(results == category);
        documentItem.classList.remove("bg-none", "text-white");
        documentItem.classList.add("bg-gray-100", "text-gray-800");
      } else {
        documentItem.classList.remove("bg-gray-100", "text-gray-800");
        documentItem.classList.add("bg-none", "text-white");
      }
    })
    console.log(category);
    axios.get('/listview/'+category)
          .then(response => {
            var productList = document.getElementById('productList');
            console.log(response);
            var watch = response.data.watches;
            for(var i=0; i<response.data.watches.length; i++){
              watchId = watch[i].id - 1 ;
              var url = "`{!! route('carousel.passId', ['index'=> 'watchId']) !!}`";
              url = url.replace('watchId',watchId);
              console.log("Image Path : ", watch[i].image);
              if(i==0){
                productList.innerHTML = `
              <a class="group">
                <div onclick="window.location.href=`+url+`" class="translation-transform translate-x-0 group hover:scale-110 transition ease-in-out delay-120 aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                  <img src="http://localhost:8000/`+watch[i].image+`" alt="watch" class="cursor-pointer h-full w-full object-cover object-center group-hover:opacity-75">
                </div>
                <h3 class="mt-4 text-center text-sm text-gray-100"> `+watch[i].serialName+`</h3>
                <p class="mt-1 text-center text-lg font-medium text-gray-100">`+watch[i].company +`</p>
              </a>
              `
              } else {
                productList.innerHTML += `
              <a class="group">
                <div onclick="window.location.href=`+url+`" class="translation-transform translate-x-0 group hover:scale-110 transition ease-in-out delay-120 aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                  <img src="http://localhost:8000/`+watch[i].image+`" alt="watch" class="cursor-pointer h-full w-full object-cover object-center group-hover:opacity-75">
                </div>
                <h3 class="mt-4 text-center text-sm text-gray-100"> `+watch[i].serialName+`</h3>
                <p class="mt-1 text-center text-lg font-medium text-gray-100">`+watch[i].company +`</p>
              </a>
              `
              }
            }
          }).catch(err=>{
            console.log("Error : ",err);
          })
  }
</script>