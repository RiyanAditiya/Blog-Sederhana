<x-layouts :title='$title'>

    <section class="bg-white dark:bg-gray-900">
        <div class="mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-sm text-center mb-6">
                <h2 class="mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">
                    Blog Kami
                </h2>
                <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400">
                    Kami berbagi cerita, tips, dan wawasan menarik dengan gaya yang sederhana dan mudah dipahami,
                    agar lebih dekat dengan pembaca.
                </p>
            </div>

            <form class="max-w-lg mx-auto mb-6">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('user'))
                    <input type="hidden" name="user" value="{{ request('user') }}">
                @endif
                <label for="default-search"
                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" id="default-search"
                        class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Cari berdasarkan judul..." autocomplete="off" autofocus name="search" />
                    <button type="submit"
                        class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                </div>
            </form>

            {{ $blogs->links() }}

            <div class="mt-4 grid gap-8 lg:grid-cols-3">

                @forelse ($blogs as $blog)
                    <article
                        class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                        <a href="/blogs?category={{ $blog->category->slug }}">
                            <div class="flex justify-between items-center mb-5 text-gray-500">
                                <span
                                    class="{{ $blog->category->color }} text-gray-600 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                    {{ $blog->category->name }}
                                </span>
                                <span class="text-sm">{{ $blog->created_at->diffForHumans() }}</span>
                            </div>
                        </a>
                        <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><a
                                href="/single/{{ $blog->slug }}">{{ $blog->title }}</a></h2>
                        <div class="mb-5 font-light text-gray-500 dark:text-gray-400">
                            {!! Str::limit($blog->article, 150) !!}</div>
                        <div class="flex justify-between items-center">
                            <a href="/blogs?user={{ $blog->user->username }}">
                                <div class="flex items-center space-x-4">
                                    <img class="w-7 h-7 rounded-full"
                                        src="{{ $blog->user->avatar ? asset('storage/' . $blog->user->avatar) : asset('img/avatar1.jpg') }}"
                                        alt="{{ $blog->user->name }}" />
                                    <span class="text-sm font-medium dark:text-white">
                                        {{ $blog->user->name }}
                                    </span>
                                </div>
                            </a>
                            <a href="/single/{{ $blog->slug }}"
                                class="inline-flex text-sm items-center font-medium text-primary-600 dark:text-primary-500 hover:underline">
                                Read more
                                <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </div>
                    </article>
                @empty
                    <div class="col-span-3 text-center py-12">
                        <svg class="mx-auto w-16 h-16 text-gray-400 dark:text-gray-500"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.75 9.75L14.25 14.25M14.25 9.75L9.75 14.25M21 12A9 9 0 1 1 3 12a9 9 0 0 1 18 0Z" />
                        </svg>
                        <h3 class="mt-4 text-lg font-semibold text-gray-700 dark:text-gray-300">Data tidak ditemukan
                        </h3>
                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Coba masukkan kata kunci lain atau
                            periksa
                            kembali pencarian Anda.</p>
                    </div>
                @endforelse



            </div>
        </div>
    </section>
</x-layouts>
