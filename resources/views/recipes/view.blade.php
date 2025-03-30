<x-app-layout>
    <x-slot name="header">
        <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">

            <li class="text-sm capitalize leading-normal text-dark after:ml-2 after:content-['/']" aria-current="page">
                My Recipes
            </li>

            <li class="ml-2 text-sm capitalize leading-normal text-dark" aria-current="page">
                View
            </li>
        </ol>

        <h6 class="mb-0 font-bold text-dark capitalize">Recipe Detail</h6>
    </x-slot>

    <div class="py-12">
        <div class="relative w-full mx-auto">

            <div
                class="relative flex flex-col flex-auto min-w-0 p-4 mx-6 overflow-hidden break-words bg-white border-0 shadow-3xl rounded-2xl bg-clip-border">
                <div class="flex flex-wrap -mx-3">
                    <div class="flex-none w-auto max-w-full px-3">
                        <div
                            class="relative inline-flex items-center justify-center text-white transition-all duration-200 ease-in-out text-base h-19 w-19 rounded-xl">
                            <img src="{{ asset('storage/' . $recipe->image_path) }}" alt="recipe_image"
                                class="w-full shadow-2xl rounded-xl" />
                        </div>
                    </div>
                    <div class="flex-none w-auto max-w-full px-3 my-auto">
                        <div class="h-full">
                            <h5 class="mb-1 font-bold">{{ $recipe->title }}</h5>

                            @php
                                $gradientClass = '';

                                switch ($recipe->category) {
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
                                {{ $recipe->category }}
                            </span>
                        </div>
                    </div>
                    <div class="w-full max-w-full px-3 mx-auto mt-4 sm:my-auto sm:mr-0 md:w-1/2 md:flex-none lg:w-4/12">
                        <div class="relative right-0">
                            <ul class="relative flex flex-wrap p-1 list-none bg-gray-50 rounded-xl">
                                <li class="z-30 flex-auto text-center">
                                    <a
                                        class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-all ease-in-out border-0 rounded-lg bg-inherit text-slate-700">
                                        <i class="fa fa-clock-o"></i>
                                        <span class="ml-2">{{ $recipe->cooking_time }} m</span>
                                    </a>
                                </li>
                                <li class="z-30 flex-auto text-center">
                                    <a
                                        class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-all ease-in-out border-0 rounded-lg bg-inherit text-yellow-700">
                                        <i class="fa fa-star"></i>
                                        <span class="ml-2">{{ number_format($ratingValue ?? 0, 1)}}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-wrap mt-6 mx-4">
            <div class="w-full max-w-full px-3 shrink-0 md:w-8/12 md:flex-0">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">

                    <div class="flex-auto p-6">
                        <p class="leading-normal uppercase text-sm">Ingredients</p>

                        <div class="flex flex-wrap mt-4">
                            @php
                                $ingredient = explode('.', $recipe->ingredients);
                                $ingredient = array_map('trim', $ingredient);
                            @endphp

                            <ul class="flex flex-col w-full pl-0 mb-0 rounded-lg">
                                @foreach ($ingredient as $d)
                                    <li
                                        class="relative flex p-4 mb-2 border-0 rounded-t-inherit rounded-xl bg-gray-50 dark:bg-slate-850">
                                        <div class="flex flex-col">
                                            <h6 class="text-sm leading-normal">{{ $d }}</h6>
                                        </div>

                                    </li>
                                @endforeach

                            </ul>
                        </div>

                    </div>
                </div>

                <div
                    class="mt-4 relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl rounded-2xl bg-clip-border">

                    <div class="flex-auto p-6">
                        <p class="leading-normal uppercase dark:text-white text-sm">Instructions</p>
                        <div class="flex flex-wrap mt-4">
                            @php
                                $instruction = explode('.', $recipe->instructions);
                                $instruction = array_map('trim', $instruction);
                            @endphp

                            <ul class="flex flex-col w-full pl-0 mb-0 rounded-lg">
                                @foreach ($instruction as $d)
                                    <li
                                        class="relative flex p-4 mb-2 border-0 rounded-t-inherit rounded-xl bg-gray-50 dark:bg-slate-850">
                                        <div class="flex flex-col">
                                            <h6 class="text-sm leading-normal">{{ $d }}</h6>
                                        </div>

                                    </li>
                                @endforeach

                            </ul>
                        </div>

                    </div>
                </div>
            </div>

            <div class="w-full max-w-full px-3 mt-6 shrink-0 md:w-4/12 md:flex-0 md:mt-0">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">

                    <div class="flex-auto p-6">
                        <div class="text-center">

                            <div class="flex justify-between mb-2">
                                <p class="leading-normal text-sm opacity-80">Author</p>
                                <div class="font-semibold leading-relaxed text-base capitalize text-slate-700">
                                    {{ $recipe->user->name }}
                                </div>
                            </div>

                            <div class="flex justify-between mb-2">
                                <p class="leading-normal text-sm opacity-80">Published At</p>
                                <p class="mb-0 font-semibold leading-normal capitalize text-sm">
                                    @php
                                        $date = $recipe->created_at;
                                        $formattedDate = \Carbon\Carbon::parse($date)->format('d M Y H:i');
                                    @endphp

                                    {{ $formattedDate }}
                                </p>
                            </div>

                            <div class="flex justify-between mb-2">
                                <p class="leading-normal text-sm opacity-80">Favorite</p>
                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="checkbox" 
                                            id="favorite-toggle"
                                            class="sr-only peer" {{ $isFavorited ?? false ? 'checked':'' }}>
                                    <div
                                        class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600 dark:peer-checked:bg-blue-600">
                                    </div>
                                </label>
                            </div>

                            <div x-data="{ rating: {{ $myRatingValue ?? 0 }} }" class="flex justify-between items-center">
                                <p class="leading-normal text-sm opacity-80">Rating</p>
                                <span>
                                    
                                    @for ($i = 1; $i <= 5; $i++)
                                        <i 
                                            @click="rating = {{ $i }}; saveRating({{ $i }})" 
                                            @mouseover="rating = {{ $i }}" 
                                            @mouseleave="rating = {{ $myRatingValue ?? 0 }}" 
                                            :class="rating >= {{ $i }} ? 'fa fa-star text-yellow-500' : 'fa fa-star text-gray-400'" 
                                            class="cursor-pointer text-xl transition-colors duration-200">
                                        </i>
                                    @endfor
                                </span>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl mt-4 rounded-2xl bg-clip-border">
                    
                    <div class="flex-auto w-full p-4 text-center">
                        <div class="transition-all duration-200 ease-nav-brand">
                            <h6 class="mb-4 text-md font-bold text-slate-700 capitalize">Need other menu?</h6>
                            <a href="{{ route('dashboard') }}" class="inline-block w-full px-8 py-2 mb-4 text-xs font-bold leading-normal text-center text-white capitalize transition-all ease-in rounded-lg shadow-md bg-slate-700 bg-150 hover:shadow-xs hover:-translate-y-px">
                                Check our recipe
                            </a>
      
                        </div>

                        
                    </div>
                </div>

                <section class="bg-white py-8 mt-4 antialiased border-0 shadow-xl rounded-2xl bg-clip-border">
                    <div class="max-w-2xl mx-auto px-4">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-md font-bold text-slate-700">Comments ({{ $comment->count() ?? 0 }})</h2>
                            
                            <div x-data="{modalIsOpen: false}" class="inline">
                                <i x-on:click="modalIsOpen = true" class="fa fa-archive cursor-pointer hover:text-gray-400"></i>
                                
                                <div x-cloak x-show="modalIsOpen" x-transition.opacity.duration.200ms x-trap.inert.noscroll="modalIsOpen" x-on:keydown.esc.window="modalIsOpen = false" x-on:click.self="modalIsOpen = false" class="fixed inset-0 z-30 flex items-end justify-center p-4 pb-8 backdrop-blur-md sm:items-center lg:p-8" role="dialog" aria-modal="true" aria-labelledby="defaultModalTitle">
                                    <!-- Modal Dialog -->
                                    <div x-show="modalIsOpen" x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity" x-transition:enter-start="opacity-0 scale-50" x-transition:enter-end="opacity-100 scale-100" class="flex w-full max-w-lg flex-col gap-4 overflow-hidden border border-outline bg-white text-on-surface shadow-xl rounded-2xl">
                                        <!-- Dialog Header -->
                                        <div class="flex items-center justify-end bg-surface-alt/60 p-4">
                                          
                                            <button x-on:click="modalIsOpen = false" aria-label="close modal">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor" fill="none" stroke-width="1.4" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                                                </svg>
                                            </button>
                                        </div>
                                        <!-- Dialog Body -->
                                        <div class="p-4 h-[250px] overflow-auto">
                                            @if($comment->isNotEmpty())
                                                @foreach ($comment as $c)
                                                    <article class="p-6 text-base bg-white rounded-lg dark:bg-gray-900">
                                                        <footer class="flex justify-between items-center mb-2">
                                                            <div class="flex items-center">
                                                                <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold"><img
                                                                        class="mr-2 w-6 h-6 rounded-full"
                                                                        src="{{ asset('assets/img/logo.png') }}"
                                                                        alt="user profile">
                                                                    {{ $c->user->name }}
                                                                </p>

                                                                @php
                                                                    $date = $c->created_at;
                                                                    $formattedDate = \Carbon\Carbon::parse($date)->format('d M Y H:i');
                                                                @endphp

                                                                <p class="text-xs text-gray-600 dark:text-gray-400">
                                                                    {{ $formattedDate }}
                                                                </p>
                                                            </div>
                                                        </footer>

                                                        <p class="text-gray-500">
                                                            {{ $c->content }}
                                                        </p>

                                                    </article>
                                                    
                                                    <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent" />

                                                @endforeach
                                            @else
                                                <span class="text-gray-500 text-xs">No comments found.</span>
                                            @endif
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-6">
                            <div class="py-2 px-4 mb-4 bg-gray-50 rounded-lg rounded-t-lg border border-gray-200">
                                <label for="comment" class="sr-only">Enter Your Comment</label>
                                <textarea id="body_comment" rows="6" name="content"
                                    class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none bg-gray-50"
                                    placeholder="Write a comment..." required></textarea>
                            </div>
                            <button type="button" onclick="submitComment()"
                                class="inline-flex items-center py-2.5 px-4 text-xs font-bold leading-normal text-center text-white bg-blue-500 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                                <i class="fa fa-send text-2.8 mr-2"></i>
                                Post comment
                            </button>
                        </div>
                    </div>
                </section>
            </div>

        </div>
    </div>

    @section('scripts')
        <script>
            const toggle = document.getElementById('favorite-toggle');

            toggle.addEventListener('change', function() {
                
                console.log('toggle clicked!');

                const recipeId = {{ $recipe->id }};
               
                // Send the favorite toggle request to the server
                fetch('/favorite', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ recipe_id: recipeId })
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data.message);
                  
                    location.reload();
                })
                .catch(error => {
                    console.error('Error:', error);
                    console.log('failed')
                });
            });

            function submitComment() {
                const recipeId = {{ $recipe->id }};
                const message = document.getElementById('body_comment').value;

                if(message){
                    // Here you can send the rating to the server
                    fetch('{{ route('recipe.comment') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include CSRF token if using Laravel
                        },
                        body: JSON.stringify({ recipeId: recipeId, content: message })
                    })
                    .then(response => response.json())
                    .then(data => {

                        location.reload();
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
                }
                else{
                    alert('empty content');
                }
                
            }

            function saveRating(con) {
                const recipeId = {{ $recipe->id }};
                
                // Here you can send the rating to the server
                fetch('{{ route('recipe.rating') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include CSRF token if using Laravel
                    },
                    body: JSON.stringify({ rating: ratingValue, recipe_id: recipeId })
                })
                .then(response => response.json())
                .then(data => {

                    location.reload();
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            }
        </script>
    @endsection
</x-app-layout>
