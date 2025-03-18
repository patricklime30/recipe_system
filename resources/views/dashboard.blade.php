<x-app-layout>
    <x-slot name="header">
        <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">

            <li class="text-sm capitalize leading-normal text-dark after:ml-2 after:content-['/']" aria-current="page">
                Dashboard
            </li>
        </ol>

        <h6 class="mb-0 font-bold text-dark capitalize">Dashboard</h6>
    </x-slot>

    <div class="py-12">
        <div class="relative w-full">

            <div class="flex flex-col flex-auto p-4 mx-10 overflow-hidden break-words bg-white border-0 shadow-3xl rounded-2xl bg-clip-border">
                <div class="flex flex-col items-center">
                    <div class="flex-none w-auto max-w-full px-3">
                        <div
                            class="relative inline-flex items-center justify-center text-white transition-all duration-200 ease-in-out text-base h-19 w-19 rounded-xl">
                            <img src="{{ asset('assets/img/recipe_book.jpg') }}" alt="profile_image"
                                class="w-full shadow-2xl rounded-xl" />
                        </div>
                    </div>

                    <div class="flex-none w-auto max-w-full px-3 my-auto">
                        <div class="h-full text-center">
                            <h5 class="mb-1 text-lg font-bold">Turn Ingredients into Inspiration</h5>
                            <p class="mb-0 font-semibold leading-normal text-sm">
                                Let your imagination run wild! Create recipes that showcase the ingredients you love.
                            </p>
                        </div>
                    </div>

                    <div class="w-full max-w-full px-3 mx-auto mt-6">
                        <div class="flex justify-center gap-4">
                            <a href="{{ route('recipe.create') }}"
                                class="hidden px-8 py-2 font-bold leading-normal text-center text-white align-middle transition-all ease-in border-0 rounded-lg shadow-md cursor-pointer text-sm bg-blue-500 lg:block tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">
                                <i class="fa fa-plus text-2.8 mr-2"></i>
                                Create New Recipe
                            </a>

                            <a href="{{ route('recipe.index') }}"
                                class="hidden px-8 py-2 font-bold leading-normal text-center text-white align-middle transition-all ease-in border-0 rounded-lg shadow-md cursor-pointer text-sm bg-gray-800 lg:block tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">
                                View My Recipe
                            </a>

                        </div>
                    </div>
                </div>
            </div>

            {{-- list recipe --}}
            <div class="px-6 pt-12 pb-4 flex flex-col items-center">
                <h4 class="font-bold text-lg">Discover Our Recipes</h4>
                <p class="mb-4">Explore a variety of delicious recipes crafted by our community.</p>

                {{-- search button --}}
                <div class="flex items-center md:w-1/3 sm:w-full">
                    <div class="relative flex flex-wrap items-stretch w-full transition-all rounded-lg ease">
                        <span
                            class="text-sm ease leading-5.6 absolute z-50 -ml-px flex h-full items-center whitespace-nowrap rounded-lg rounded-tr-none rounded-br-none border border-r-0 border-transparent bg-transparent py-2 px-2.5 text-center font-normal text-slate-500 transition-all">
                            <i class="fa fa-search"></i>
                        </span>
                        <input type="text"
                            class="pl-9 text-sm focus:shadow-primary-outline ease w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow"
                            placeholder="Seacrh recipe here..." />
                    </div>
                </div>
            </div>

            {{-- card --}}
            <div class="flex flex-wrap p-4 mx-6">
                @foreach ($recipe as $data)
                    <div class="w-full max-w-full px-3 shrink-0 md:w-4/12 md:flex-0 mb-4">
                        <a href="{{ route('recipe.show', $data->id) }}"
                            class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl rounded-2xl bg-clip-border">
                            <img class="w-full max-h-[180px] rounded-t-2xl" src="{{ asset('storage/'.$data->image_path) }}"
                                alt="cover recipe">

                            <div class="flex-auto p-6 pt-0">

                                <div class="mt-6 text-center">

                                    <div class="mb-2 font-semibold leading-relaxed text-xs text-slate-700">
                                        @php
                                            $gradientClass = '';

                                            switch ($data->category) {
                                                case 'breakfast':
                                                    $gradientClass = 'from-emerald-600 to-teal-300';
                                                    break;
                                                case 'lunch':
                                                    $gradientClass = 'from-orange-600 to-orange-300';
                                                    break;
                                                default:
                                                    $gradientClass = 'from-gray-600 to-gray-300'; // Default case if needed
                                                    break;
                                            }
                                        @endphp

                                        <span class="bg-gradient-to-tl {{ $gradientClass }} px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">
                                            {{ $data->category }}
                                        </span>
                                    </div>

                                    <div class="mt-6 mb-2 font-semibold leading-relaxed text-base text-slate-700">
                                        {{ $data->title }}
                                    </div>
                                </div>
                            </div>

                            <div class="border-black/12.5 rounded-t-2xl p-6 text-center pt-0 pb-6 lg:pt-2 lg:pb-4">
                                <div class="flex justify-between">
                                    <span class="text-slate-700 text-sm">
                                        <i class="fa fa-clock-o"></i>
                                        {{ $data->cooking_time }} Min
                                    </span>

                                    <span class="text-yellow-700 text-sm">
                                        <i class="fa fa-star"></i>
                                        {{ number_format($data->ratings()->avg('score') ?? 0, 1) }}
                                    </span>

                                    <span class="text-gray-500 text-sm">
                                        <i class="fa fa-comment"></i>
                                        0
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
                
            </div>

            {{-- end list recipe --}}
        </div>
    </div>
</x-app-layout>
