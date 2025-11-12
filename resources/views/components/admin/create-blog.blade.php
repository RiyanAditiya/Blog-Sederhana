   @push('style')
       <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
   @endpush

   <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
       <!-- Modal body -->
       <form action="/dashboard/create" method="post" id="blog-form">
           @csrf
           <div class="mb-4">
               <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
               <input type="text" name="title" id="title" value="{{ old('title') }}"
                   class=" @error('title') border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500
                   @enderror border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                   placeholder="Type blog title" autofocus>
               @error('title')
                   <p class="mt-2 text-xs text-red-600 dark:text-red-500">{{ $message }}</p>
               @enderror
           </div>

           <div class="mb-4">
               <label for="category"
                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
               <select id="category" name="category_id"
                   class=" @error('category_id') border-red-500 text-red-700 placeholder-red-700 focus:ring-red-500 focus:border-red-500
                   @enderror border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                   <option selected="" value="">Select category blog</option>
                   @foreach ($categories as $category)
                       <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>{{ $category->name }}</option>
                   @endforeach
               </select>
               @error('category_id')
                   <p class="mt-2 text-xs text-red-600 dark:text-red-500">{{ $message }}</p>
               @enderror
           </div>
           <div class="sm:col-span-2 mb-4">
               <label for="article"
                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Article</label>
               <textarea id="article" rows="4" name="article"
                   class="hidden @error('article') border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500
                   @enderror block p-2.5 w-full text-sm text-gray-900 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                   placeholder="Write article here">{{ old('article') }}</textarea>
               <div id="editor"></div>
               @error('article')
                   <p class="mt-2 text-xs text-red-600 dark:text-red-500">{{ $message }}</p>
               @enderror
           </div>
           <button type="submit"
               class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
               Add blog
           </button>
           <a href="/dashboard"
               class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-3 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Cancel</a>

       </form>
   </div>

   @push('script')
       <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>

       <script>
           const quill = new Quill('#editor', {
               theme: 'snow',
               placeholder: 'Write article here'
           });

           const blogForm = document.querySelector('#blog-form');
           const blogArticle = document.querySelector('#article');
           const quillEditor = document.querySelector('#editor');

           blogForm.addEventListener('submit', function(e) {
               e.preventDefault();

               const content = quillEditor.children[0].innerHTML;

               blogArticle.value = content;

               this.submit();
           })
       </script>
   @endpush
