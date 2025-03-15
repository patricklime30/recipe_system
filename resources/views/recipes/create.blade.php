<x-app-layout>
    <x-slot name="header">
        <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">

            <li class="text-sm capitalize leading-normal text-dark after:ml-2 after:content-['/']" aria-current="page">
                My Recipes
            </li>

            <li class="ml-2 text-sm capitalize leading-normal text-dark" aria-current="page">
                Create
            </li>
        </ol>

        <h6 class="mb-0 font-bold text-dark capitalize">Create Recipe</h6>
    </x-slot>

    <div class="py-12">
        <form method="post" action="{{ route('recipe.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="flex flex-wrap mx-10 mb-6">
                <div class="w-full max-w-full shrink-0 md:w-8/12 md:flex-0">
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl rounded-2xl bg-clip-border">

                        <div class="flex-auto p-6">
                            <div class="flex flex-wrap -mx-3">
                                <div class="w-full max-w-full px-3 shrink-0 md:w-full md:flex-0">
                                    <div class="mb-4">
                                        <label for="title"
                                            class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">
                                            Title
                                        </label>
                                        <input type="text" name="title" required
                                            class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                    </div>
                                </div>

                                <div class="w-full max-w-full px-3 shrink-0 md:w-full md:flex-0">
                                    <div class="mb-4">
                                        <label for="ingredients"
                                            class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Ingredients</label>
                                        <textarea name="ingredients" rows="4" required
                                            class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"></textarea>
                                    </div>
                                </div>

                                <div class="w-full max-w-full px-3 shrink-0 md:w-full md:flex-0">
                                    <div class="mb-4">
                                        <label for="instructions"
                                            class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Instructions</label>
                                        <textarea name="instructions" rows="4" required
                                            class="focus:shadow-primary-outline text-sm ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="w-full max-w-full md:px-3 mt-6 shrink-0 md:w-4/12 md:flex-0 md:mt-0">
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                        <div class="flex-auto p-6">
                            <div class="flex flex-wrap -mx-3">
                                <div class="w-full max-w-full px-3 shrink-0 md:w-full md:flex-0">
                                    <div class="mb-4">
                                        <label for="image"
                                            class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">
                                            Image
                                        </label>
                                        <input type="file" name="image" required
                                            class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                    </div>
                                </div>

                                <div class="w-full max-w-full px-3 shrink-0 md:w-full md:flex-0">
                                    <div class="mb-4">
                                        <label for="cooking_time"
                                            class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Cooking
                                            Time</label>
                                        <div class="flex justify-between gap-4 items-center">
                                            <input type="number" name="cooking_time" required
                                                class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                            minute(s)
                                        </div>

                                    </div>
                                </div>

                                <div class="w-full max-w-full px-3 shrink-0 md:w-full md:flex-0">
                                    <div class="mb-4">
                                        <label for="category"
                                            class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Category</label>
                                        <select name="category" required
                                            class="focus:shadow-primary-outline text-sm ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                            <option value="breakfast">Breakfast</option>
                                            <option value="lunch">Lunch</option>
                                            <option value="dinner">Dinner</option>
                                        </select>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex gap-4 mt-6">
                    <button type="submit"
                        class="inline-block px-8 py-2 mb-4 ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-sm tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">
                        <i class="fa fa-save mr-2"></i>
                        Save
                    </button>
                    <a href="{{ route('recipe.index') }}"
                        class="inline-block px-8 py-2 mb-4 ml-auto font-bold leading-normal text-center text-gray-800 align-middle transition-all ease-in bg-transparent border border-gray-800 rounded-lg shadow-md cursor-pointer text-sm tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">
                        Cancel
                    </a>
                </div>

            </div>
        </form>

    </div>
</x-app-layout>
