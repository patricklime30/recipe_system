<x-app-layout>
    <x-slot name="header">
        <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">

            <li class="text-sm capitalize leading-normal text-dark after:ml-2 after:content-['/']" aria-current="page">
                My Recipes
            </li>
        </ol>

        <h6 class="mb-0 font-bold text-dark capitalize">My Recipes</h6>
    </x-slot>

    <div class="py-12">
        <div class="flex flex-wrap mx-10 mb-6">
            <!-- card1 -->
            <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="flex-auto p-4">
                        <div class="flex flex-row -mx-3">
                            <div class="flex-none w-2/3 max-w-full px-3">
                                <div>
                                    <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">
                                        Total Recipes
                                    </p>
                                    <h5 class="mb-2 font-bold">{{ count($recipe) }}</h5>
                                    
                                </div>
                            </div>
                            <div class="px-3 text-right basis-1/3">
                                <div class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-blue-500 to-violet-500">
                                    <i class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- card2 -->
            <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="flex-auto p-4">
                        <div class="flex flex-row -mx-3">
                            <div class="flex-none w-2/3 max-w-full px-3">
                                <div>
                                    <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">
                                        Breakfast
                                    </p>
                                    <h5 class="mb-2 font-bold dark:text-white">{{ $totalBreakfast }}</h5>
                                   
                                </div>
                            </div>
                            <div class="px-3 text-right basis-1/3">
                                <div class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-red-600 to-orange-600">
                                    <i class="ni leading-none ni-world text-lg relative top-3.5 text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- card3 -->
            <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="flex-auto p-4">
                        <div class="flex flex-row -mx-3">
                            <div class="flex-none w-2/3 max-w-full px-3">
                                <div>
                                    <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">
                                        Lunch
                                    </p>
                                    <h5 class="mb-2 font-bold dark:text-white">{{ $totalLunch }}</h5>
                                    
                                </div>
                            </div>
                            <div class="px-3 text-right basis-1/3">
                                <div
                                    class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-emerald-500 to-teal-400">
                                    <i class="ni leading-none ni-paper-diploma text-lg relative top-3.5 text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- card4 -->
            <div class="w-full max-w-full px-3 sm:w-1/2 sm:flex-none xl:w-1/4">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="flex-auto p-4">
                        <div class="flex flex-row -mx-3">
                            <div class="flex-none w-2/3 max-w-full px-3">
                                <div>
                                    <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">
                                        Dinner
                                    </p>
                                    <h5 class="mb-2 font-bold">{{ $totalDinner }}</h5>
                                   
                                </div>
                            </div>
                            <div class="px-3 text-right basis-1/3">
                                <div
                                    class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-orange-500 to-yellow-500">
                                    <i class="ni leading-none ni-cart text-lg relative top-3.5 text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- table --}}
        <div class="flex flex-wrap">
            <div class="flex-none w-full">
                <div
                    class="relative flex flex-col min-w-0 p-4 mx-10 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
                    <div class="flex flex-wrap p-4 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">

                        <div class="flex items-center flex-none w-1/2 max-w-full px-3">
                            <h4 class="font-bold text-lg">List of Recipes</h4>
                        </div>

                        <div class="flex-none w-1/2 max-w-full px-3 text-right">
                            <a href="{{ route('recipe.create') }}"
                                class="inline-block px-8 py-2 mb-0 text-sm font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-none cursor-pointer bg-150 active:opacity-85 hover:-translate-y-px tracking-tight-rem bg-x-25 hover:opacity-75">
                                <i class="fa fa-plus text-2.8 mr-2"></i>
                                Create New Recipe
                            </a>
                        </div>
                    </div>
                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-0 overflow-x-auto">
                            <table class="items-center w-full mb-0 align-top border-collapse text-slate-500">
                                <thead class="align-bottom">
                                    <tr>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Title
                                        </th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Category
                                        </th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Created At
                                        </th>
                                        <th
                                            class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-collapse border-solid shadow-none tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($recipe->isEmpty())
                                        <tr>
                                            <td colspan="4" class="text-center p-4">
                                                <span class="text-gray-500 text-xs">No recipes found.</span>
                                            </td>
                                        </tr>
                                    @else
                                        @foreach ($recipe as $data)
                                            <tr class="border-y">
                                                <td
                                                    class="p-2 align-middle bg-transparent whitespace-nowrap shadow-transparent">
                                                    <div class="flex px-2">
                                                        <div>
                                                            <img src="{{ asset('storage/'.$data->image_path) }}"
                                                                class="inline-flex items-center justify-center mr-4 text-sm text-white transition-all duration-200 ease-in-out h-9 w-9 rounded-xl"
                                                                alt="recipe" />
                                                        </div>
                                                        <div class="my-auto">
                                                            <h6 class="mb-0 text-sm leading-normal font-semibold">{{ $data->title }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td
                                                    class="p-2 text-sm leading-normal text-center align-middle bg-transparent whitespace-nowrap shadow-transparent">
                                                    
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
                                                    
                                                    <span
                                                        class="bg-gradient-to-tl {{ $gradientClass }} px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">
                                                        {{ $data->category }}
                                                    </span>
                                                </td>
                                                <td
                                                    class="p-2 text-center align-middle bg-transparent whitespace-nowrap shadow-transparent">
                                                    <span class="text-xs font-semibold leading-tight text-slate-400">
                                                        {{ $data->created_at }}
                                                    </span>
                                                </td>
                                                <td
                                                    class="p-2 align-middle text-center bg-transparent whitespace-nowrap shadow-transparent">
                                                    <a href="{{ route('recipe.show', $data->id) }}"
                                                        class="text-xs font-bold leading-tight text-slate-400 mr-4">
                                                        View
                                                    </a>

                                                    <a href="{{ route('recipe.edit', $data->id) }}"
                                                        class="text-xs font-bold leading-tight text-blue-400 mr-4">
                                                        Edit
                                                    </a>

                                                    <form action="{{ route('recipe.destroy', $data->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="text-xs font-bold leading-tight text-red-400" onclick="return confirm('Are you sure you want to delete this recipe?');">Delete</button>
                                                    </form>
                                                    
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
