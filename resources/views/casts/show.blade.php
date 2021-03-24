<x-front-layout>
     <section id="serie-header-section">
        <div class="max-w-6xl mx-auto mt-3">
            <div class="flex justify-center md:flex-row flex-wrap rounded bg-main-gray">
                <div class="w-full md:w-1/4 p-4 text-gray-200">
                    <div class="flex justify-center md:float-right">
                        <img class="lozad blur w-16 h-16 md:w-24 md:h-24 rounded-full mx-auto md:mx-0 md:mr-6 hover:opacity-75 transition transition-900 transition-ease-in bg-indigo"
                                data-src="{{ asset('storage/cast/'.$cast->poster_path)  }}"
                                loading="lazy"
                                alt="{{ $cast->name }}"
                        />
                    </div>
                </div>
                <div class="w-full md:w-3/4 p-4 text-center md:text-left">
                    <h2 class="text-lg text-yellow-300 font-bold mx-8">{{ $cast->name }}</h2>
                    <div class="text-gray-300 mx-8">Ka {{ count($cast->movies) }} Filma me titra shqip ne faqen tone.</div>
                </div>
            </div>
        </div>
    </section>
    <section class="max-w-6xl mx-auto mt-4 p-2">
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6 md:gap-2 rounded">
      @if (isset($movies))
          @foreach($movies as $movie)
     <x-front.card>
        <x-slot name="image">
            <div class="aspect-w-2 aspect-h-3">
                <img class="object-cover lozad blur" 
                     data-src="{{ asset('storage/movie/'.$movie->poster_path)  }}"
                     alt="" />
                <div class="absolute bg-black rounded bg-opacity-0 group-hover:bg-opacity-60 w-full h-full top-0 flex items-center group-hover:opacity-100 transition justify-evenly">
                <a href="{{ route('movies.show', $movie->slug) }}" class="hover:scale-110 text-white opacity-0 transform translate-y-3 group-hover:translate-y-0 group-hover:opacity-100 transition">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-play-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814l-3.5-2.5z" />
                </svg>
                </a>
            </div>
          </div>
        </x-slot>
            <a href="{{ route('movies.show', $movie->slug) }}">
                <h3 class="text-white font-bold group-hover:text-blue-300 text-sm">{{ $movie->title }}</h3>
            </a>
      </x-front.card>      
    @endforeach
      @endif
    </div>
    @if ($movies->hasPages())    
    <div class="m-2 p-2 bg-gray-100 rounded-xl">
        {{ $movies->links() }}
    </div>
    @endif
</section>
</x-front-layout>