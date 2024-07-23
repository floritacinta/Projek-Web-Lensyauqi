<x-base-html>
    <x-navbar-dashboard />

    <div class="container font-poppins">
        <h1 class="my-5 text-3xl font-extrabold">Detail Artikel</h1>
        <div class="flex flex-col max-h-[475px] gap-5 p-3 px-4 overflow-y-auto shadow-lg">
            <p class="font-medium text-end">{{ date_format($article->created_at, 'd F Y') }}</p>
            <h1 class="text-xl font-medium text-center">{{ $article->title }}</h1>
            <img src="{{ Storage::url($article->image) }}" alt="image" class="mx-auto w-96">
            <p class="font-medium">{{ $article->content }}</p>
        </div>
    </div>
</x-base-html>
