 <div class="w-full text-main-mavi bg-main-gray">
        <div x-data="{ open: false }"
        class="flex flex-col max-w-screen-xl px-1 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
            <div class="flex flex-row items-center justify-between p-4">
                <a href="/"
                 class="font-semibold tracking-widest focus:outline-none focus:shadow-outline">
                    <span class="block md:hidden">M</span>
                    <span class="hidden md:block">Marinsat</span>
                </a>
                <div class=" flex item-center">
                     <form method="GET" action="{{ route('search') }}">
                         <input class="mx-2 lg:mx-6 rounded-lg bg-gray-200" type="search" name="search">
                     </form>
                </div>
                <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline" @click="open = !open">
                    <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                        <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                        <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>

            <nav :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow hidden pb-4 md:pb-0 md:flex md:justify-end md:flex-row">
                <x-front.front-nav-link href="{{ route('movies.index') }}" :active="request()->routeIs('movies.index')">
                    Filma
                </x-front.front-nav-link>
                 <x-front.front-nav-link href="{{ route('series.index') }}" :active="request()->routeIs('series.index')">
                     Seriale
                </x-front.front-nav-link>
                <x-front.front-nav-link href="{{ route('casts.index') }}" :active="request()->routeIs('casts.index')">
                     Aktoret
                </x-front.front-nav-link>
             <div @click.away="open = false" class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center w-full px-4 py-2 mt-2 text-normal font-semibold text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:w-auto md:inline md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-main-light focus:bg-main-light focus:outline-none focus:shadow-outline">
                        <span>Genres</span>
                    </button>
                    <div x-show="open"
                    x-transition:enter="transition ease-out duration-100"
                    x-transition:enter-start="transform opacity-0 scale-95"
                    x-transition:enter-end="transform opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75"
                     x-transition:leave-start="transform opacity-100 scale-100"
                      x-transition:leave-end="transform opacity-0 scale-95"
                      class="absolute right-0 w-full md:max-w-screen-sm md:w-screen mt-2 origin-top-right z-30">
                        <div class="px-2 pt-2 pb-4 bg-main-gray rounded-md shadow-lg dark-mode:bg-gray-700">
                          <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                            @foreach(App\Models\Genre::all() as $genre)
                            <a class="p-2 bg-main-mavi hover:bg-main-light rounded-lg" href="{{ route('genres.show', $genre->slug) }}">
                                <div class="font-semibold text-main-gray">{{ $genre->title }}</div>
                            </a>
                            @endforeach
                          </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
