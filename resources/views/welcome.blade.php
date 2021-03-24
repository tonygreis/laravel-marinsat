<x-front-layout>
    <section class="max-w-6xl mx-auto mt-4 p-2">
        <div class="m-2 p-2 text-2xl font-bold text-main-mavi"><h1>Filma</h1></div>
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6 md:gap-2 rounded">
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
    </div>
   </section>
       <section class="max-w-6xl mx-auto mt-4 p-2">
        <div class="m-2 p-2 text-2xl font-bold text-main-mavi"><h2>Seriale</h2></div>
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6 md:gap-2 rounded">
    @foreach($series as $serie)
     <x-front.card>
        <x-slot name="image">
            <div class="aspect-w-2 aspect-h-3">
                <img class="object-cover lozad blur"
                     data-src="{{ asset('storage/serie/'.$serie->poster_path)  }}"
                     alt="" />
                <div class="absolute bg-black rounded bg-opacity-0 group-hover:bg-opacity-60 w-full h-full top-0 flex items-center group-hover:opacity-100 transition justify-evenly">
                <a href="{{ route('series.show', $serie->slug) }}" class="hover:scale-110 text-white opacity-0 transform translate-y-3 group-hover:translate-y-0 group-hover:opacity-100 transition">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-play-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814l-3.5-2.5z" />
                </svg>
                </a>
            </div>
          </div>
        </x-slot>
            <a href="{{ route('series.show', $serie->slug) }}">
                <h3 class="text-white font-bold group-hover:text-blue-300 text-sm">{{ $serie->name }}</h3>
            </a>
      </x-front.card>
    @endforeach
    </div>
   </section>
</x-front-layout>
