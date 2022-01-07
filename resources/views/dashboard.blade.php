<div class="px-2">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-rows-2 grid-flow-col gap-6">
                <div class="bg-white row-span-2 shadow rounded-md p-4 flex">
                    <h1>Total Transactions</h1>
                    <h1 class="mt-2 font-bold text-3xl ml-auto">
                        {{ count($transactions) }}
                    </h1>
                </div>
                <div class="bg-white row-span-2 shadow rounded-md p-4 flex">
                    <h1>Total Products</h1>
                    <h1 class="mt-2 font-bold text-3xl ml-auto">
                        {{ count($products) }}
                    </h1>
                </div>
            </div>
        </div>
    </div>

    @if ($listTransaction->isEmpty())
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
            <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                <span class="block">There is no transaction!</span>
            </h2>
        </div>
    @else
        <div class="py-12">
            <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
                <h2 class="text-2xl font-extrabold tracking-tight text-gray-900">Recent Transactions</h2>
                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="flex mt-6 flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                User
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Date
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Time
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Price
                                            </th>
                                            <th scope="col" class="relative px-6 py-3">
                                                <span class="sr-only">Detail</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">

                                        @foreach ($listTransaction as $tr)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="flex-shrink-0 h-10 w-10">
                                                            <img class="h-10 w-10 rounded-full"
                                                                src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60"
                                                                alt="">
                                                        </div>
                                                        <div class="ml-4">
                                                            <div class="text-sm font-medium text-gray-900">
                                                                {{ $tr->user->name }}</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-500">
                                                        {{ $tr->created_at->format('d M Y') }}</div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-500">
                                                        {{ $tr->created_at->format('H:i') }}</div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-500">
                                                        {{ $tr->total_price }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <a href="{{ route('transactions.edit', $tr->id) }}"
                                                        class="text-orange-600 hover:text-orange-900">Detail</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <!-- More people... -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

</div>
