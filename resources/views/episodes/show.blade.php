<x-front-layout>
    <section>
        @if(!empty($episode))
            <div id="episode" class="max-w-6xl mx-auto my-3 mt-2 p-2">
                    <div class="w-full px-3">
                        {{-- embeds start --}}
                        @if(!empty($episode->embeds))
                          <section
                            id="embed"
                            class="mt-2">
                            @foreach($episode->embeds as $count => $embed)
                                <div id="{{ $embed->id }}" class="flex justify-around city">
                                    <div class="aspect-w-16 aspect-h-9">
                                        <iframe
                                            class="rounded-lg"
                                            ref="frame"
                                            src="{{ $embed->web_url }}"
                                            frameborder="0"
                                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen
                                            loading="lazy"
                                        ></iframe>
                                    </div>
                                </div>
                            @endforeach
                            <div class="flex flex-wrap bg-main-blue mt-2 rounded">
                                @foreach($episode->embeds as $count => $embed)
                                    <button
                                        @if ($loop->first) id="default" @endif
                                    class="p-1 lg:p-2 m-1 md:m-2 lg:m-2
                                                    focus:outline-none focus:bg-main-mavi bg-main-light text-gray-900 hover:bg-main-rose
                                                    font-bold hover:text-gray-500 rounded shadow tablink"
                                        onclick="openEmbed(event,'{{ $embed->id }}')">{{ $embed->web_name }}</button>
                                @endforeach
                            </div>
                            <script>
                                function openEmbed(evt, cityName) {
                                    var i, x, tablinks;
                                    x = document.getElementsByClassName("city");
                                    for (i = 0; i < x.length; i++) {
                                        x[i].style.display = "none";
                                    }
                                    tablinks = document.getElementsByClassName("tablink");
                                    for (i = 0; i < x.length; i++) {
                                        tablinks[i].className = tablinks[i].className.replace(" bg-blue-deed", "");
                                    }
                                    document.getElementById(cityName).style.display = "block";
                                    evt.currentTarget.className += " bg-blue-deed";
                                }
                                document.getElementById("default").click();
                            </script>
                        </section>
                        @endif
                        {{-- embeds end --}}

                        {{-- episode title start --}}
                        <div class="flex justify-center bg-gray-900 text-main-mavi mt-3 p-3 rounded text-center text-lg">
                            {{ $episode->season->serie->name }} - Episodi {{ $episode->episode_number }}
                        </div>
                      
                        {{-- episodes list start --}}
                        <div class="flex flex-wrap my-3 rounded bg-gray-900 p-2">
                            @foreach($episode->season->episodes as $ep)
                                @if($episode->id == $ep->id)
                                    <div class="w-1/2 md:w-1/4 p-2">
                                        <a href="#"
                                           class="w-full p-2 text-center m-2 text-white rounded bg-main-mavi hover:bg-main-rose hover:text-white transition-bg transition-500 transition-ease-in">
                                            Episodi {{ $ep->episode_number }}</a>
                                    </div>
                                @else
                                <div class="w-1/2 md:w-1/4 p-2">
                                    <a href="{{ route('episodes.show', $ep->slug) }}"
                                       class="w-full p-2 text-center m-2 text-white rounded bg-main-blue hover:bg-main-rose hover:text-gray-200 transition-bg transition-500 transition-ease-in">
                                        Episodi {{ $ep->episode_number }}</a>
                                </div>
                                @endif
                            @endforeach
                        </div>
                        {{-- episode list ends --}}
                        <div class="">
                            @if(!empty($episode->watchs))
                                <div class="text-gray-200 bg-gray-900 my-3 p-2 rounded">
                                    <h3 class="text-lg p-2 rounded">Shikoje ne hoste te tjere</h3>
                                    <div class="flex flex-wrap">
                                        @foreach($episode->watchs as $watch)
                                            <a href="{{ $watch->web_url }}" target="_blank">
                                                <div
                                                    class="flex mt-1 h-18 ml-1 p-2 hover:bg-blue-700 hover:text-gray-500 rounded border border-blue-500 transition-bg transition-500 transition-ease-in">
                                                    {{ $watch->web_name }}</div>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            @if(!empty($episode->downloads))
                                <div class="text-gray-200 bg-gray-900 my-3 p-2 rounded">
                                    <h3 class="text-lg text-gray-300 p-2 rounded">Shkarkoje ne hoste te tjere</h3>
                                    <div class="flex flex-wrap">
                                        @foreach($episode->downloads as $download)
                                            <a href="{{ $download->web_url }}" target="_blank">
                                                <div
                                                    class="flex mt-1 h-18 ml-1 p-2 hover:bg-blue-700 hover:text-gray-500 rounded border border-blue-500 transition-bg transition-500 transition-ease-in">
                                                    <svg class="fill-current w-4 h-4 mr-2 text-blue-deep" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
                                                    {{ $download->web_name }}
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
            </div>
        @endif
    </section>
</x-front-layout>
