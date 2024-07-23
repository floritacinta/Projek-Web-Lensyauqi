<x-base-html>

    <x-navbar />
    @if ($article)
        <div class="container flex flex-col gap-4 my-5">
            <h1 class="py-2 text-3xl font-bold text-center border text-body-secondary border-x-0 font-roboto">Blog</h1>
            <div class="justify-between gap-10 m-0 lg:gap-0 row">
                <x-item-blog :title="$article->title" :src="Storage::url($article->image)" :description="$article->content" />
                <div class="flex flex-col lg:col-5">
                    <h1 class="py-3 text-2xl font-bold text-center text-white uppercase bg-deepKoamaru font-roboto">
                        Berita
                        Terbaru</h1>
                    <ul class="py-8 space-y-3 overflow-y-auto max-h-80">
                        @foreach ($articles as $article)
                            <li>
                                <a href="{{ route('blog', ['id' => $article->id]) }}">
                                    <div
                                        class="flex gap-5 p-3 rounded-2xl {{ request()->is("blog/$article->id") ? 'bg-gray-200' : '' }}">
                                        <img src="{{ Storage::url($article->image) }}" alt="image" class="h-20">
                                        <div class="flex flex-col">
                                            <h4 class="text-base font-medium font-poppins">{{ $article->title }}</h4>
                                            <p class="font-medium text-gray-600">
                                                {{ date_format($article->created_at, 'd F Y') }}</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif


    <div class="container my-20">
        <h1 class="py-1 mt-5 text-3xl font-bold text-center border text-body-secondary border-x-0 font-roboto"
            id="gallery">Galeri
        </h1>
        <div class="grid grid-cols-2 gap-4 mt-4 lg:grid-cols-6">
            @for ($i = 1; $i <= 38; $i++)
                <img src="{{ asset("assets/images/gallery/$i.png") }}" alt="img" class="object-cover h-full">
            @endfor
        </div>
    </div>

    <x-footer />
</x-base-html>
