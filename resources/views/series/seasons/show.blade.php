<x-front-layout>
    <main class="max-w-6xl mx-auto">
         <section id="season-header-section">
        <div class="container mx-auto mt-3">
            <div class="flex justify-center md:flex-row flex-wrap rounded bg-main-gray">
                <div class="w-full md:w-1/4 p-4 text-gray-200">
                    <div class="flex justify-center md:float-right">
                        <img class="w-16 h-16 md:w-24 md:h-24 rounded-full mx-auto md:mx-0 md:mr-6 hover:opacity-75 transition transition-900 transition-ease-in bg-indigo"
                             @if($season->poster_path)
                             src="{{ asset('storage/serie/season/'.$season->poster_path)  }}"
                             @else
                             src="{{ asset('img/loader.jpg') }}"
                             @endif
                             alt="{{ $season->name}} me titra shqip"
                             loading="lazy"
                        />
                    </div>
                </div>
                <div class="w-full md:w-3/4 p-4 text-center md:text-left">
                    <h1 class="text-lg text-main-mavi font-bold mx-8">{{ $serie->name }} {{ $season->name }} me titra shqip.</h1>
                    <div class="text-blue-600 mx-8">Ky Season ka {{ count($season->episodes) }} Episodes.</div>
                </div>
            </div>
        </div>
    </section>
    <section class="max-w-6xl mx-auto mt-4 p-2">
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6 md:gap-2 rounded">
      @if (isset($episodes))
          @foreach($episodes as $episode)
     <x-front.card>
        <x-slot name="image">
            <div class="aspect-w-2 aspect-h-3">
                <img class="object-cover lozad blur" 
                     data-src="{{ asset('storage/serie/season/'.$season->poster_path)  }}"
                     alt="" />
                <div class="absolute bg-black rounded bg-opacity-0 group-hover:bg-opacity-60 w-full h-full top-0 flex items-center group-hover:opacity-100 transition justify-evenly">
                <a href="{{ route('episodes.show', $episode->slug) }}" class="hover:scale-110 text-white opacity-0 transform translate-y-3 group-hover:translate-y-0 group-hover:opacity-100 transition">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-play-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814l-3.5-2.5z" />
                </svg>
                </a>
            </div>
          </div>
        </x-slot>
            <a href="{{ route('episodes.show', $episode->slug) }}">
                <h3 class="text-main-mavi font-bold text-sm">{{ $episode->name }}</h3>
            </a>
      </x-front.card>      
    @endforeach
      @endif
    </div>
    @if($episodes->hasPages())
    <div class="m-2 p-2 bg-gray-100 rounded-xl">
        {{ $episodes->links() }}
    </div>
    @endif
</section>
    </main>
</x-front-layout>