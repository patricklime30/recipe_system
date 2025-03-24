@foreach ($recipe as $data)
    <div class="w-full max-w-full px-3 shrink-0 md:w-4/12 md:flex-0 mb-4">
        <a href="{{ route('recipe.show', $data->id) }}"
            class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl rounded-2xl bg-clip-border">
            <img class="w-full h-[180px] rounded-t-2xl" src="{{ asset('storage/'.$data->image_path) }}"
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
                        {{ $data->comments()->count() ?? 0 }}
                    </span>
                </div>
            </div>
        </a>
    </div>
@endforeach
                                            
<!-- Pagination Links -->
@if(request()->routeIs('dashboard'))
    <div class="mt-4">
        {{ $recipe->links() }} <!-- Use the default Laravel pagination view -->
    </div>
@endif