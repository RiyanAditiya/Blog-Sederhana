<x-layouts :title='$title'>

    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
            <article
                class="mx-auto w-full max-w-4xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <a href="/blogs"
                    class="inline-flex items-center px-4 py-2 mb-6 text-xs font-medium text-white bg-indigo-500 rounded-md 
          hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 
          dark:focus:ring-offset-gray-900 no-underline hover:no-underline">
                    ← Kembali
                </a>
                <header class="mb-4 lg:mb-6 not-format">
                    <address class="flex items-center mb-6 not-italic">
                        <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                            <img class="mr-4 w-16 h-16 rounded-full"
                                src="{{ $blogs->user->avatar ? asset('storage/' . $blogs->user->avatar) : asset('img/avatar1.jpg') }}"
                                alt="{{ $blogs->user->name }}">
                            <div>
                                <a href="/blogs?user={{ $blogs->user->username }}" rel="author"
                                    class="text-xl font-bold text-gray-900 dark:text-white">{{ $blogs->user->name }}</a>
                                <span
                                    class="{{ $blogs->category->color }} text-gray-600 ms-1 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                    {{ $blogs->category->name }}
                                </span>
                                <p class="text-base text-gray-500 dark:text-gray-400"><time pubdate
                                        datetime="2022-02-08"
                                        title="February 8th, 2022">{{ $blogs->created_at->diffForHumans() }}</time></p>
                            </div>
                        </div>
                    </address>
                    <h1
                        class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
                        {{ $blogs->title }}</h1>
                </header>
                <div>{!! $blogs->article !!}</div>
            </article>
        </div>
    </main>

</x-layouts>
