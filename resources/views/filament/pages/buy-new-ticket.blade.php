<x-filament-panels::page
    x-data="{
        selectedTicketInfo: {},
        showPanelCart: true,
        showPanelCart: true,
    }"
>

    {{-- <a href="#!" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
    <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
</a> --}}

    {{-- <div
    @class([
        'w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700',
        // 'shadow shadow-red-400',
        'shadow shadow-blue-400',
    ])
>
    <a href="#!">
        <img class="p-8 rounded-t-lg" src="https://flowbite.com/docs/images/products/apple-watch.png" alt="product image" />
    </a>
    <div class="px-5 pb-5">
        <a href="#!">
            <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">Apple Watch Series 7 GPS, Aluminium Case, Starlight Sport</h5>
        </a>
        <div class="flex items-center mt-2.5 mb-5">
            <div class="flex items-center space-x-2 rtl:space-x-reverse">
                <x-blocks.stars.filled />
                <x-blocks.stars.filled />
                <x-blocks.stars.filled />
                <x-blocks.stars.filled />
                <x-blocks.stars.half />
            </div>
            <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-3">5.0</span>
        </div>
        <div class="flex items-center justify-between">
            <span class="text-3xl font-bold text-gray-900 dark:text-white">$599</span>
            <a
                href="#!"
                @class([
                    'flex items-center justify-between gap-x-3',
                    // 'text-white bg-blue-700 hover:bg-blue-800',
                    // 'focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm',
                    // 'px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800',

                    'text-blue-700 hover:text-white border border-blue-600 bg-white hover:bg-blue-700 focus:ring-0 focus:outline-none focus:ring-blue-300 rounded-md text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:bg-gray-900 dark:focus:ring-blue-800'
                ])>
                <!--
                @svg('carbon-checkmark', 'w-5 h-5')
                -->
                @svg('heroicon-m-x-mark', 'w-5 h-5')

                Selected
            </a>
        </div>
    </div>
</div> --}}

    @php
        $preFilter = rand(0, 1) ? 'morePrize' : null;
    @endphp

    {{-- <div
    @class([
        'cursor-pointer motion-safe:hover:scale-110 relative hover:z-40',
        'shadow shadow-red-400' => $preFilter == 'morePrize',
        'w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700',
    ])
>
    <h5 class="mb-4 text-xl font-medium text-gray-500 dark:text-gray-400">Standard plan</h5>
    <div class="flex items-baseline text-gray-900 dark:text-white">
    <span class="text-3xl font-semibold">$</span>
    <span class="text-5xl font-extrabold tracking-tight">49</span>
    <span class="ms-1 text-xl font-normal text-gray-500 dark:text-gray-400">/month</span>
    </div>
    <ul role="list" class="space-y-5 my-7">
    <li class="flex items-center">
    <svg class="flex-shrink-0 w-4 h-4 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
    </svg>
    <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400 ms-3">2 team members</span>
    </li>
    <li class="flex">
    <svg class="flex-shrink-0 w-4 h-4 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
    </svg>
    <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400 ms-3">20GB Cloud storage</span>
    </li>
    <li class="flex">
    <svg class="flex-shrink-0 w-4 h-4 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
    </svg>
    <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400 ms-3">Integration help</span>
    </li>
    <li class="flex line-through decoration-gray-500">
    <svg class="flex-shrink-0 w-4 h-4 text-gray-400 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
    </svg>
    <span class="text-base font-normal leading-tight text-gray-500 ms-3">Sketch Files</span>
    </li>
    <li class="flex line-through decoration-gray-500">
    <svg class="flex-shrink-0 w-4 h-4 text-gray-400 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
    </svg>
    <span class="text-base font-normal leading-tight text-gray-500 ms-3">API Access</span>
    </li>
    <li class="flex line-through decoration-gray-500">
    <svg class="flex-shrink-0 w-4 h-4 text-gray-400 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
    </svg>
    <span class="text-base font-normal leading-tight text-gray-500 ms-3">Complete documentation</span>
    </li>
    <li class="flex line-through decoration-gray-500">
    <svg class="flex-shrink-0 w-4 h-4 text-gray-400 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
    </svg>
    <span class="text-base font-normal leading-tight text-gray-500 ms-3">24×7 phone & email support</span>
    </li>
    </ul>
    <button type="button" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-200 dark:focus:ring-blue-900 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full text-center">Choose plan</button>
</div> --}}

{{-- <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 xl:grid-cols-8 gap-1 lg:gap-2"> --}}
<div
    class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-8 xl:grid-cols-10 gap-2 lg:gap-4"
>
    @foreach (range(1, 15) as $item)
    @php
        $selected = $item == 8;
    @endphp

        <div
            @class([
                // 'block cursor-pointer max-w p-2 bg-white border border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-700',
                // 'scale-100 motion-safe:hover:scale-110 relative',
                // 'shadow hover:shadow-blue-400',
                // 'hover:z-10',

                // 'cursor-pointer',
                'p-2 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset',
                'dark:ring-white/5 rounded-lg transition-all duration-250',
                'focus:outline focus:outline-2 focus:outline-red-500 col-span-1 relative hover:z-20',

                ...($selected ? [
                    'scale-110',  // 110|125|150
                    'z-10',
                    'shadow shadow-blue-400',
                ] : [
                    'shadow hover:shadow-gray-400',
                ]),

                'motion-safe:hover:scale-125',
            ])>
            {{-- <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5> --}}
            {{-- <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p> --}}

            <div class="col-span-5 components-laravel-card-header">
                <div class="grid grid-cols-6"><!---->
                    <div class="col-span-6">
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white text-center"> R$ 2.00</h2>
                    </div>
                </div>
            </div>

            <div class="text-gray-500 dark:text-gray-400 text-sm">
                <table class="w-full">
                    <tbody>
                        <tr class="pl-2">
                            <th class="text-left"><svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1"
                                    viewBox="0 0 32 32" fill="currentColor"
                                    class="blade-carbon-icons w-7 h-7 text-red-500">
                                    <defs></defs>
                                    <path
                                        d="M23,20.5151c0-4.6152-3.78-5.1411-6.8171-5.563-3.31-.4609-5.1829-.86-5.1829-3.71C11,8.8491,13.5071,8,15.6538,8a6.7538,6.7538,0,0,1,5.5681,2.6279l1.5562-1.2558A8.6508,8.6508,0,0,0,17,6.0962V3H15V6.022c-3.6152.2192-6,2.26-6,5.22,0,4.73,3.83,5.2627,6.9075,5.69C19.16,17.3848,21,17.7744,21,20.5151,21,23.5474,17.8674,24,16,24c-3.4294,0-4.8782-.9639-6.2219-2.6279L8.2219,22.6279A8.4382,8.4382,0,0,0,15,25.9648V29h2V25.9551C20.7256,25.6509,23,23.6279,23,20.5151Z"
                                        transform="translate(0 0)"></path>
                                    <rect id="_Transparent_Rectangle_" data-name="<Transparent Rectangle>" class="cls-1"
                                        width="32" height="32" style="fill: none;"></rect>
                                </svg></th>
                            <td class="text-right">17.5</td>
                        </tr>
                        <tr>
                            <th class="pl-1"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"
                                    fill="currentColor" class="blade-carbon-icons w-5 h-5 text-red-500">
                                    <defs></defs>
                                    <title>percentage--filled</title>
                                    <path d="M9,14a5,5,0,1,1,5-5A5.0055,5.0055,0,0,1,9,14Z"></path>
                                    <rect x="0.0293" y="15.0001" width="31.9413" height="1.9998"
                                        transform="translate(-6.6274 16) rotate(-45)"></rect>
                                    <path d="M23,28a5,5,0,1,1,5-5A5.0055,5.0055,0,0,1,23,28Z"></path>
                                    <rect id="_Transparent_Rectangle_" data-name="<Transparent Rectangle>" class="cls-1"
                                        width="32" height="32" style="fill: none;"></rect>
                                </svg></th>
                            <td class="text-right">10</td>
                        </tr>
                        <tr>
                            <th class="pl-1"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true" class="heroicons w-5 h-5 text-red-500">
                                    <path
                                        d="M10 9a3 3 0 100-6 3 3 0 000 6zM6 8a2 2 0 11-4 0 2 2 0 014 0zM1.49 15.326a.78.78 0 01-.358-.442 3 3 0 014.308-3.516 6.484 6.484 0 00-1.905 3.959c-.023.222-.014.442.025.654a4.97 4.97 0 01-2.07-.655zM16.44 15.98a4.97 4.97 0 002.07-.654.78.78 0 00.357-.442 3 3 0 00-4.308-3.517 6.484 6.484 0 011.907 3.96 2.32 2.32 0 01-.026.654zM18 8a2 2 0 11-4 0 2 2 0 014 0zM5.304 16.19a.844.844 0 01-.277-.71 5 5 0 019.947 0 .843.843 0 01-.277.71A6.975 6.975 0 0110 18a6.974 6.974 0 01-4.696-1.81z">
                                    </path>
                                </svg></th>
                            <td class="text-right">10</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- <div class="flex items-center justify-between">
                <span class="text-3xl font-bold text-gray-900 dark:text-white">$599</span>
            </div> --}}

            <div class="flex items-center justify-center pt-2">
                <a
                    href="#!"
                    @class([
                        'cursor-pointer',
                        'flex items-center justify-between gap-x-3',

                        'focus:ring-0 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm',
                        'px-5 py-2.5 text-center',

                        ...($selected ? [
                            'text-white bg-blue-700 hover:bg-blue-800',
                            'dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800',
                        ] : [
                            'bg-white hover:bg-blue-700',
                            'dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:bg-gray-900 dark:focus:ring-blue-800',
                        ]),

                        // 'text-blue-700 hover:text-white border border-blue-600 focus:ring-0 focus:outline-none focus:ring-blue-300 rounded-md text-base font-medium px-5 py-2.5 text-center dark:border-blue-500'
                        'transition-all duration-250',
                    ])>

                    @if ($selected)
                        @svg('heroicon-m-x-mark', 'w-5 h-5')
                        Remove
                    @else
                        @svg('carbon-checkmark', 'w-5 h-5')
                        Select
                    @endif

                    {{--
                        @mouseenter="showChecked = !showChecked"
                        @mouseleave="showChecked = !showChecked"
                    --}}
                </a>
            </div>
        </div>
    @endforeach
</div>

    {{-- ------------------ --}}
    <div class="max-w-full mx-auto p-6 lg:p-8">
        <div class="flex justify-center">
            <div class="grid grid-cols-12 md:grid-cols-12 sm:grid-cols-12 gap-1 lg:gap-4">
                <div class="col-span-12 mt-4 pt-4 mb-2">
                    <h2 class="text-lg text-gray-100 w-full"> Opções de valores </h2>
                </div>

                <div
                    class="scale-100 p-2 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-md shadow-gray-500/20 transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500 col-span-1 cursor-pointer motion-safe:hover:scale-110 relative hover:z-40">
                    <div class="grid grid-cols-5">
                        <div class="col-span-5 components-laravel-card-header">
                            <div class="grid grid-cols-6"><!---->
                                <div class="col-span-6">
                                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white text-center"> R$ 2.00</h2>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-5 components-laravel-card-body">
                            <div class="text-gray-500 dark:text-gray-400 text-sm">
                                <table class="w-full">
                                    <tbody>
                                        <tr class="pl-2">
                                            <th class="text-left"><svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1"
                                                    viewBox="0 0 32 32" fill="currentColor"
                                                    class="blade-carbon-icons w-7 h-7 text-red-500">
                                                    <defs></defs>
                                                    <path
                                                        d="M23,20.5151c0-4.6152-3.78-5.1411-6.8171-5.563-3.31-.4609-5.1829-.86-5.1829-3.71C11,8.8491,13.5071,8,15.6538,8a6.7538,6.7538,0,0,1,5.5681,2.6279l1.5562-1.2558A8.6508,8.6508,0,0,0,17,6.0962V3H15V6.022c-3.6152.2192-6,2.26-6,5.22,0,4.73,3.83,5.2627,6.9075,5.69C19.16,17.3848,21,17.7744,21,20.5151,21,23.5474,17.8674,24,16,24c-3.4294,0-4.8782-.9639-6.2219-2.6279L8.2219,22.6279A8.4382,8.4382,0,0,0,15,25.9648V29h2V25.9551C20.7256,25.6509,23,23.6279,23,20.5151Z"
                                                        transform="translate(0 0)"></path>
                                                    <rect id="_Transparent_Rectangle_" data-name="<Transparent Rectangle>" class="cls-1"
                                                        width="32" height="32" style="fill: none;"></rect>
                                                </svg></th>
                                            <td class="text-right">17.5</td>
                                        </tr>
                                        <tr>
                                            <th class="pl-1"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"
                                                    fill="currentColor" class="blade-carbon-icons w-5 h-5 text-red-500">
                                                    <defs></defs>
                                                    <title>percentage--filled</title>
                                                    <path d="M9,14a5,5,0,1,1,5-5A5.0055,5.0055,0,0,1,9,14Z"></path>
                                                    <rect x="0.0293" y="15.0001" width="31.9413" height="1.9998"
                                                        transform="translate(-6.6274 16) rotate(-45)"></rect>
                                                    <path d="M23,28a5,5,0,1,1,5-5A5.0055,5.0055,0,0,1,23,28Z"></path>
                                                    <rect id="_Transparent_Rectangle_" data-name="<Transparent Rectangle>" class="cls-1"
                                                        width="32" height="32" style="fill: none;"></rect>
                                                </svg></th>
                                            <td class="text-right">10</td>
                                        </tr>
                                        <tr>
                                            <th class="pl-1"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" aria-hidden="true" class="heroicons w-5 h-5 text-red-500">
                                                    <path
                                                        d="M10 9a3 3 0 100-6 3 3 0 000 6zM6 8a2 2 0 11-4 0 2 2 0 014 0zM1.49 15.326a.78.78 0 01-.358-.442 3 3 0 014.308-3.516 6.484 6.484 0 00-1.905 3.959c-.023.222-.014.442.025.654a4.97 4.97 0 01-2.07-.655zM16.44 15.98a4.97 4.97 0 002.07-.654.78.78 0 00.357-.442 3 3 0 00-4.308-3.517 6.484 6.484 0 011.907 3.96 2.32 2.32 0 01-.026.654zM18 8a2 2 0 11-4 0 2 2 0 014 0zM5.304 16.19a.844.844 0 01-.277-.71 5 5 0 019.947 0 .843.843 0 01-.277.71A6.975 6.975 0 0110 18a6.974 6.974 0 01-4.696-1.81z">
                                                    </path>
                                                </svg></th>
                                            <td class="text-right">10</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!---->
                </div>
                <div
                    class="scale-100 p-2 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-md shadow-gray-500/20 transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500 col-span-1 cursor-pointer motion-safe:hover:scale-110 relative hover:z-40">
                    <div class="grid grid-cols-5">
                        <div class="col-span-5 components-laravel-card-header">
                            <div class="grid grid-cols-6"><!---->
                                <div class="col-span-6">
                                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white text-center"> R$ 2.00</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-5 components-laravel-card-body">
                            <div class="text-gray-500 dark:text-gray-400 text-sm">
                                <table class="w-full">
                                    <tbody>
                                        <tr class="pl-2">
                                            <th class="text-left"><svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1"
                                                    viewBox="0 0 32 32" fill="currentColor"
                                                    class="blade-carbon-icons w-7 h-7 text-red-500">
                                                    <defs></defs>
                                                    <path
                                                        d="M23,20.5151c0-4.6152-3.78-5.1411-6.8171-5.563-3.31-.4609-5.1829-.86-5.1829-3.71C11,8.8491,13.5071,8,15.6538,8a6.7538,6.7538,0,0,1,5.5681,2.6279l1.5562-1.2558A8.6508,8.6508,0,0,0,17,6.0962V3H15V6.022c-3.6152.2192-6,2.26-6,5.22,0,4.73,3.83,5.2627,6.9075,5.69C19.16,17.3848,21,17.7744,21,20.5151,21,23.5474,17.8674,24,16,24c-3.4294,0-4.8782-.9639-6.2219-2.6279L8.2219,22.6279A8.4382,8.4382,0,0,0,15,25.9648V29h2V25.9551C20.7256,25.6509,23,23.6279,23,20.5151Z"
                                                        transform="translate(0 0)"></path>
                                                    <rect id="_Transparent_Rectangle_" data-name="<Transparent Rectangle>" class="cls-1"
                                                        width="32" height="32" style="fill: none;"></rect>
                                                </svg></th>
                                            <td class="text-right">35</td>
                                        </tr>
                                        <tr>
                                            <th class="pl-1"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"
                                                    fill="currentColor" class="blade-carbon-icons w-5 h-5 text-red-500">
                                                    <defs></defs>
                                                    <title>percentage--filled</title>
                                                    <path d="M9,14a5,5,0,1,1,5-5A5.0055,5.0055,0,0,1,9,14Z"></path>
                                                    <rect x="0.0293" y="15.0001" width="31.9413" height="1.9998"
                                                        transform="translate(-6.6274 16) rotate(-45)"></rect>
                                                    <path d="M23,28a5,5,0,1,1,5-5A5.0055,5.0055,0,0,1,23,28Z"></path>
                                                    <rect id="_Transparent_Rectangle_" data-name="<Transparent Rectangle>" class="cls-1"
                                                        width="32" height="32" style="fill: none;"></rect>
                                                </svg></th>
                                            <td class="text-right">5</td>
                                        </tr>
                                        <tr>
                                            <th class="pl-1"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" aria-hidden="true" class="heroicons w-5 h-5 text-red-500">
                                                    <path
                                                        d="M10 9a3 3 0 100-6 3 3 0 000 6zM6 8a2 2 0 11-4 0 2 2 0 014 0zM1.49 15.326a.78.78 0 01-.358-.442 3 3 0 014.308-3.516 6.484 6.484 0 00-1.905 3.959c-.023.222-.014.442.025.654a4.97 4.97 0 01-2.07-.655zM16.44 15.98a4.97 4.97 0 002.07-.654.78.78 0 00.357-.442 3 3 0 00-4.308-3.517 6.484 6.484 0 011.907 3.96 2.32 2.32 0 01-.026.654zM18 8a2 2 0 11-4 0 2 2 0 014 0zM5.304 16.19a.844.844 0 01-.277-.71 5 5 0 019.947 0 .843.843 0 01-.277.71A6.975 6.975 0 0110 18a6.974 6.974 0 01-4.696-1.81z">
                                                    </path>
                                                </svg></th>
                                            <td class="text-right">20</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!---->
                </div>
            </div>
        </div>
    </div>

    <div class="fixed bottom-0 left-0 right-0 bg-white dark:bg-gray-800 border-t border-gray-300 dark:border-gray-700 p-4 flex items-center justify-between z-30">
        <div class="absolute start-full top-0 z-[1] -ms-1 w-max -translate-x-1/2 rounded-md bg-white rtl:translate-x-1/2 dark:bg-gray-900">
            <div class="absolute -top-4 right-4 h-10 w-50">
                <button
                    type="button"
                    class="cursor-pointer flex items-center justify-between gap-x-3 focus:ring-0 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-white hover:bg-blue-700 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:bg-gray-900 dark:focus:ring-blue-800 transition-all duration-250"
                >
                    @svg('bi-arrow-bar-down', 'w-5 h-5')
                </button>
            </div>
        </div>

        <div class="w-full grid grid-cols-12 gap-2 lg:gap-4">
            <div class="col-span-12">
                <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">Selected: 10/10 fast</h5>
            </div>

            <div class="col-span-12 sm:col-span-12 md:col-span-8 xl:col-span-8 w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 sm:none">
                <dl class="grid max-w-screen-xl grid-cols-2 gap-4 p-2 mx-auto text-gray-900 sm:grid-cols-3 xl:grid-cols-5 dark:text-white sm:p-4">
                    <div class="flex flex-col items-center justify-center">
                        <dt class="mb-2 text-3xl font-extrabold">10</dt>
                        <dd class="text-gray-500 dark:text-gray-400">Participants</dd>
                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <dt class="mb-2 text-3xl font-extrabold">10/10</dt>
                        <dd class="text-gray-500 dark:text-gray-400">Change from 10 to 10</dd>
                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <dt class="mb-2 text-3xl font-extrabold">10%</dt>
                        <dd class="text-gray-500 dark:text-gray-400">10% chance of winning</dd>
                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <dt class="mb-2 text-3xl font-extrabold">14.451</dt>
                        <dd class="text-gray-500 dark:text-gray-400">Winners in this mode</dd>
                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <dt class="mb-2 text-3xl font-extrabold">+$252.892</dt>
                        <dd class="text-gray-500 dark:text-gray-400">Total of paid prizes</dd>
                    </div>
                </dl>
            </div>
            <div class="col-span-12 sm:col-span-12 md:col-span-4 xl:col-span-4 w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="px-5 pb-5">
                    <a href="#">
                        <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">
                            10/10 fast
                        </h5>
                    </a>

                    <div class="flex items-center justify-center mt-2.5 mb-5 gap-x-3">
                        <div
                            class="flex items-center space-x-1 rtl:space-x-reverse"
                            title="Number of participants"
                        >
                            <span
                                class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-3"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" class="heroicons w-5 h-5">
                                    <path d="M10 9a3 3 0 100-6 3 3 0 000 6zM6 8a2 2 0 11-4 0 2 2 0 014 0zM1.49 15.326a.78.78 0 01-.358-.442 3 3 0 014.308-3.516 6.484 6.484 0 00-1.905 3.959c-.023.222-.014.442.025.654a4.97 4.97 0 01-2.07-.655zM16.44 15.98a4.97 4.97 0 002.07-.654.78.78 0 00.357-.442 3 3 0 00-4.308-3.517 6.484 6.484 0 011.907 3.96 2.32 2.32 0 01-.026.654zM18 8a2 2 0 11-4 0 2 2 0 014 0zM5.304 16.19a.844.844 0 01-.277-.71 5 5 0 019.947 0 .843.843 0 01-.277.71A6.975 6.975 0 0110 18a6.974 6.974 0 01-4.696-1.81z">
                                    </path>
                                </svg>
                            </span>

                            <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"></path>
                            </svg>
                            <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"></path>
                            </svg>
                            <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"></path>
                            </svg>
                            <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"></path>
                            </svg>
                            <svg class="w-4 h-4 text-gray-200 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"></path>
                            </svg>
                        </div>

                        <div
                            class="flex items-center space-x-1 rtl:space-x-reverse"
                            title="Probability of winning"
                        >
                            <span
                                class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-3"
                            >
                                @svg('custom_icons-percent-circle-solid', 'w-5 h-5 scale-110')
                            </span>
                            <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"></path>
                            </svg>
                            <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"></path>
                            </svg>
                            <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"></path>
                            </svg>
                            <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"></path>
                            </svg>
                            <svg class="w-4 h-4 text-gray-200 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"></path>
                            </svg>
                        </div>

                        <div
                            class="flex items-center space-x-1 rtl:space-x-reverse"
                            title="Prize value"
                        >
                            <span
                                class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-3"
                            >
                                @svg('majestic-dollar-circle-solid', 'w-5 h-5')
                            </span>
                            <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"></path>
                            </svg>
                            <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"></path>
                            </svg>
                            <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"></path>
                            </svg>
                            <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"></path>
                            </svg>
                            <svg class="w-4 h-4 text-gray-200 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"></path>
                            </svg>
                        </div>

                    </div>

                    <div class="flex items-center justify-between">
                        <span class="text-3xl font-bold text-gray-900 dark:text-white">R$2.00</span>
                        <div class="flex space-x-4">
                            <div>
                                <button
                                    type="button"
                                    class="cursor-pointer flex items-center justify-between gap-x-3 focus:ring-0 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-red hover:bg-red-700 dark:text-white dark:hover:text-white dark:hover:bg-red-500 dark:bg-red-700 dark:focus:ring-red-800 transition-all duration-250">Cancel</button>
                            </div>

                            <div>
                                <button
                                    type="button"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Confirm</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-filament-panels::page>
