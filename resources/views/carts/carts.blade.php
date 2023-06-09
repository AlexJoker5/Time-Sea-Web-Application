<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>

<body>
<div class="h-full bg-gray-100 pt-10">
    @if(!$carts->isEmpty())
        
    <h1 class="mb-10 text-center text-2xl font-bold">Cart Items</h1>
    <div class="mx-auto max-w-5xl justify-center px-6 md:flex md:space-x-6 xl:px-0">
        <div class="rounded-lg md:w-2/3">
            @foreach($carts as $index=>$cart)

                    <div class="watchItem justify-between mb-6 rounded-lg bg-white p-6 shadow-md sm:flex sm:justify-start">
                        <img
                            src="{{ asset($watches[$index]->image) }}"
                            alt="product-image" class="w-full rounded-lg sm:w-40"/>
                        <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
                            <div class="mt-5 sm:mt-0">
                                <h2 class="watchName text-lg font-bold text-gray-900">{{ $watches[$index]->serialName }}</h2>
                                <p id="company" class="mt-1 text-xs text-gray-700">{{ $watches[$index]->company }}</p>
                            </div>
                            <div class="mt-4 flex justify-between sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">
                                <div class="flex items-center border-gray-100">
                                    <span id="decrement-{{ $cart->id }}"
                                          class="cursor-pointer rounded-l bg-gray-100 py-1 px-3.5 duration-100 hover:bg-blue-500 hover:text-blue-50"
                                          data-id="{{ $cart->id }}">-</span>
                                    <input class="h-8 w-8 border bg-white text-center text-xs outline-none"
                                           type="number" name="quantity" value="{{ $cart->quantity }}" min="1"
                                           data-id="{{ $cart->id }}">
                                    <span id="increment-{{ $cart->id }}"
                                          class="cursor-pointer rounded-r bg-gray-100 py-1 px-3 duration-100 hover:bg-blue-500 hover:text-blue-50"
                                          data-id="{{ $cart->id }}">+</span>
                                </div>

                                <div class="flex items-center space-x-4">
                                    <p id="cart-total-cost-{{ $cart->id }}" class="text-sm">${{ $cart->totalCost }}</p>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         onClick="deleteBtn({{ $cart->id }})"
                                         stroke-width="1.5"
                                         stroke="currentColor"
                                         class="h-5 w-5 cursor-pointer duration-150 hover:text-red-500">
                                        <path  stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>


            @endforeach
        </div>
        <!-- Sub total -->
        @foreach($payment as $p)
        <div class="mt-6 h-full rounded-lg border bg-white p-6 shadow-md md:mt-0 md:w-1/3">
            <div class="mb-2 flex justify-between">
                <p class="text-gray-700">Subtotal</p>
                <p id="payment-subTotal-{{ $p->id }}" class="text-gray-700">${{ $p->subTotal }}</p>
            </div>
            <div class="flex justify-between">
                <p class="text-gray-700">Tax</p>
                <p class="text-gray-700">{{ $p->tax }}%</p>
            </div>
            <hr class="my-4"/>
            <div class="flex justify-between">
                <p class="text-lg font-bold">Total</p>
                <div class="">
                    <p id="payment-total-{{ $p->id }}" class="mb-1 text-lg font-bold">${{ $p->total }}</p>
                    <p class="text-sm text-gray-700">including VAT</p>
                </div>
            </div>
            <button data-modal-target="defaultModal" data-modal-toggle="defaultModal"  class="mt-6 w-full rounded-md bg-blue-500 py-1.5 font-medium text-blue-50 hover:bg-blue-600">Check
                out
            </button>
            @break
            @endforeach
        </div>
    </div>
    @elseif($carts->isEmpty())
        <div class="flex justify-center pt-10"><h1 class="text-2xl">There is currently no item in your Cart.</h1></div>
    @endif
</div>

<!-- Billling Modal -->
<div id="defaultModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
          <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Billing
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="defaultModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Form -->
          <form class="billing-form" action="{{ route('carts.billing', ['userId'=>$userId]) }}" method="POST">
          @csrf
              <div class="grid gap-6 mb-6 md:grid-cols-1">
                  <div class="relative z-0">
                      <input required name="city" type="text" id="floating_standard" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                      <label for="floating_standard" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">City</label>
                  </div>
                  <div class="relative z-0">
                      <input required name="state" type="text" id="floating_standard" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                      <label for="floating_standard" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">State</label>
                  </div>
                  <div class="relative z-0">
                      <input required name="zipCode" type="number" id="floating_standard" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                      <label for="floating_standard" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Zip Code</label>
                  </div>
                  <div class="relative z-0">
                      <input required name="creditCardNo" type="number" id="floating_standard" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                      <label for="floating_standard" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Credit Cart No.</label>
                  </div>
                  <div class="relative z-0">
                      <input required name="creditCartExpireDate" type="text" id="floating_standard" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                      <label for="floating_standard" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Expired Date</label>
                  </div>
                  
              </div>
              
              <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
          </form>

        </div>
    </div>
</div>
</body>
<script>
    var watchName = document.getElementsByClassName('watchName');
    var watchItem = document.getElementsByClassName('watchItem');

    document.querySelectorAll('[id^="increment"], [id^="decrement"]').forEach(button => {
        button.addEventListener('click', async () => {
            const id = button.dataset.id;
            const input = document.querySelector(`input[data-id="${id}"]`);
            const quantity = parseInt(input.value);

            if (button.id.startsWith('increment')) {
                input.value = quantity + 1;
                await updateQuantity(id, quantity + 1);
            } else {
                if (quantity > 1) {
                    input.value = quantity - 1;
                    await updateQuantity(id, quantity - 1);
                }
            }
        });
    });

    

    function updateQuantity(id, quantity) {
        const url = '/carts/update-quantity/'+id;
        const data = { id: id, quantity: quantity};

        axios.put(url,data)
        .then(async(response) => {
            console.log(response);
            const cartId = response.data.id;
            const paymentId = response.data.paymentId;
            //console.log("Card ID : ", cartId);
            const cartTotalCostElement = document.querySelector(`#cart-total-cost-${cartId}`);
            //console.log("Cart Total Cost Element : ",cartTotalCostElement);
            let totalCost = response.data.totalCost.toFixed(2);
            cartTotalCostElement.innerHTML = `$${totalCost}`;

            const paymentSubTotalElement = document.querySelector(`#payment-subTotal-${paymentId}`);
            //console.log("Payment Sub Total query : ", paymentSubTotalElement);
            const paymentTotalElement = document.querySelector(`#payment-total-${paymentId}`);
            //console.log("Payment Total query : ", paymentTotalElement);
            let subTotal = response.data.subTotal.toFixed(2);
            let total = response.data.total.toFixed(2);
            paymentSubTotalElement.innerHTML = `$${subTotal}`;
            paymentTotalElement.innerHTML = `$${total}`;
        }).catch(
            error => console.log(error)
        )

    }

    function deleteBtn(cartId){
        axios.delete('/carts/delete-cart/'+cartId)
            .then(response => {
                const paymentId = response.data.paymentId;
                const paymentSubTotalElement = document.querySelector(`#payment-subTotal-${paymentId}`);
                const paymentTotalElement = document.querySelector(`#payment-total-${paymentId}`);
                console.log("Carts " ,response.data.carts);
                console.log("Watches " ,response.data.watches);
                console.log("Payment sub Total :" ,response.data.subTotal,", ",response.data.total);
                console.log("Watch Name : ", watchName);
                console.log("Count : ", response.data.count);
                for(var i=0; i<watchName.length; i++){
                    if(watchName[i].innerHTML === response.data.watches.serialName.replace(/\r/g, '')){
                        watchItem[i].style.display = 'none';
                        console.log("Same");
                    } 
                }
                let subTotal = response.data.subTotal.toFixed(2);
                let total = response.data.total.toFixed(2);
                paymentSubTotalElement.innerHTML = `$${subTotal}`;
                paymentTotalElement.innerHTML = `$${total}`;
            })
            .catch(error => {
                console.log(error);
            })
    }

</script>
