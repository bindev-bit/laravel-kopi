<div x-data="{detail: false}">

    <div class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:text-center">
                <h2 class="text-base text-orange-800 font-semibold tracking-wide uppercase">Get</h2>
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">Top Products
                </p>
            </div>
            <div class="max-w-2xl py-12 mt-6 mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
                <div class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                    @foreach ($product as $pd)
                        <a href="#" wire:click="getData({{ $pd->id }})" @click="detail = true"
                            class="group">
                            <div
                                class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                                <img src="{{ asset('storage/' . $pd->image_url) }}"
                                    alt="tall slender porcelain bottle with natural clay textured body and cork stopper."
                                    class="w-full h-full object-center object-cover group-hover:opacity-75">
                            </div>
                            <h3 class="mt-4 text-sm text-gray-700">{{ $pd->name }}</h3>
                            <p class="mt-1 text-lg font-medium text-gray-900">
                                Rp. {{ $pd->price }}
                            </p>
                        </a>

                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div x-show="detail" class="fixed z-10 inset-0 overflow-hidden" role="dialog" aria-modal="true">
        <div class="flex min-h-screen text-center md:block md:px-2 lg:px-4" style="font-size: 0;">
            <div class="hidden fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity md:block" aria-hidden="true">
            </div>
            <span class="hidden md:inline-block md:align-middle md:h-screen" aria-hidden="true">&#8203;</span>
            <div x-show="detail" x-transition:enter="transition-transform ease-in-out duration-500"
                x-transition:enter-start="transform translate-y-full" x-transition:enter-end="transform translate-y-0"
                x-transition:leave="transition-transform ease-in duration-500"
                x-transition:leave-start="transform translate-y-0" x-transition:leave-end="transform translate-y-full"
                class="flex text-base text-left transform transition w-full md:inline-block md:max-w-2xl md:px-4 md:my-8 md:align-middle lg:max-w-4xl">
                <div
                    class="w-full relative flex items-center bg-white px-4 pt-14 pb-8 overflow-hidden shadow-2xl sm:px-6 sm:pt-8 md:p-6 lg:p-8">
                    <form action="{{ route('list-carts.store') }}" method="POST">
                        @csrf

                        <button @click="detail = false" type="button"
                            class="absolute top-4 right-4 text-gray-400 hover:text-gray-500 sm:top-8 sm:right-6 md:top-6 md:right-6 lg:top-8 lg:right-8">
                            <span class="sr-only">Close</span>
                            <!-- Heroicon name: outline/x -->
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>

                        <div class="w-full grid grid-cols-1 gap-y-8 gap-x-6 items-start sm:grid-cols-12 lg:gap-x-8">
                            <div
                                class="aspect-w-2 aspect-h-3 rounded-lg bg-gray-100 overflow-hidden sm:col-span-4 lg:col-span-5">
                                <img src="{{ asset('storage/' . $image) }}"
                                    alt="Two each of gray, white, and black shirts arranged on table."
                                    class="object-center object-cover">
                            </div>
                            <div class="sm:col-span-8 lg:col-span-7">
                                <input type="hidden" id="id" name="id" value="{{ $productId }}" />

                                <h2 class="text-2xl font-extrabold text-gray-900 sm:pr-12">
                                    {{ $name }}
                                </h2>

                                <section aria-labelledby="information-heading" class="mt-2">
                                    <h3 id="information-heading" class="sr-only">Product information</h3>

                                    <p class="text-2xl text-gray-900">
                                        $ {{ $price }}
                                    </p>

                                    <!-- Reviews -->
                                    <div class="mt-6">
                                        <h4 class="sr-only">Reviews</h4>
                                        <div class="flex items-center">
                                            <div class="flex items-center">
                                                <svg class="text-gray-900 h-5 w-5 flex-shrink-0"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" aria-hidden="true">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                </svg>

                                                <!-- Heroicon name: solid/star -->
                                                <svg class="text-gray-900 h-5 w-5 flex-shrink-0"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" aria-hidden="true">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                </svg>

                                                <!-- Heroicon name: solid/star -->
                                                <svg class="text-gray-900 h-5 w-5 flex-shrink-0"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" aria-hidden="true">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                </svg>

                                                <!-- Heroicon name: solid/star -->
                                                <svg class="text-gray-900 h-5 w-5 flex-shrink-0"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" aria-hidden="true">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                </svg>

                                                <!-- Heroicon name: solid/star -->
                                                <svg class="text-gray-200 h-5 w-5 flex-shrink-0"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" aria-hidden="true">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                </svg>
                                            </div>
                                            <p class="sr-only">3.9 out of 5 stars</p>
                                        </div>
                                    </div>

                                    <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                                        {{ $desc }}
                                    </p>
                                </section>

                                @auth
                                    <button type="submit"
                                        class="mt-6 w-full bg-orange-600 border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white hover:bg-orange-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                                        Add to cart
                                    </button>
                                @else
                                    <a href="{{ route('login') }}"
                                        class="mt-6 w-full bg-orange-600 border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white hover:bg-orange-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">Add
                                        to cart</a>
                                @endauth
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
