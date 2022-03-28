<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}

    <form action="" method="POST" enctype="multipart/form-data" class="xl:w-3/5 lg:w-3/5 md:w-3/5 w-full border mx-auto p-5 rounded shadow my-3">
        @if (session()->has('success'))
    <div id="alert-3" class="flex p-4 mb-4 bg-green-100 rounded-lg dark:bg-green-200" role="alert">
        <svg class="flex-shrink-0 w-5 h-5 text-green-700 dark:text-green-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
        <div class="ml-3 text-sm font-medium text-green-700 dark:text-green-800">
            {{session('success')}}
        </div>
        <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-100 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 dark:bg-green-200 dark:text-green-600 dark:hover:bg-green-300" data-dismiss-target="#alert-3" aria-label="Close">
          <span class="sr-only">Close</span>
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
      </div>
    @endif
        <div class="mb-6">
            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Type your title here</label>
            <input type="title" name="title" id="title" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" value="{{old('title',$post->title)}}" wire:model="title">
            @error('title')
            <p class="text-red">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="slug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Type your slug here</label>
            <input type="slug" name="slug" id="slug" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" value="{{old('slug',$post->slug)}}" wire:model="slug">
            @error('slug')
            <p class="text-red">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Type your price here</label>
            <input type="number" name="price" id="price" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" value="{{old('price',$post->price)}}" wire:model="price">
            @error('price')
                <p class="text-red-600 text-sm font-medium">{{$message}}</p>
                @else
                    @if ($lessThan)
                    <p class="text-gray-500 font-medium text-sm text-red-500">Harus lebih dari 5000</p>
                    @else
                    <p class="text-gray-500 font-medium text-sm">price sudah lebih dari 5000</p>
                    @endif
                @enderror
        </div>
        <div class="mb-6">
            <label for="tax" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">This column will be filled automatically</label>
            <input type="number" name="tax" id="tax" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" value="{{old('tax',$post->tax)}}" wire:model="tax">
            @error('tax')
            <p class="text-red">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Type your description here</label>
            <input type="description" name="description" id="description" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" value="{{old('description',$post->description)}}">
            @error('description')
            <p class="text-red">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="thumbnail" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Drop your thumbnail here</label>
            <input type="file" name="thumbnail" id="thumbnail" class="shadow-sm bg-gray-50 border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" >
            @error('thumbnail')
            <p class="text-red">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="prePostFiles" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Drop your files here</label>
            <input type="file" name="prePostFiles" id="prePostFiles" class="shadow-sm bg-gray-50 border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" multiple wire:model="prePostFiles">
            @error('prePostFiles')
            <p class="text-red">{{$message}}</p>
            @enderror
        </div>
        @if ($prePostFiles!=null)
        {{-- @dd($prePostFiles) --}}
        <div class="batas w-full flex items-center">
            <div class="line w-2/6 h-1 bg-blue-400 rounded"></div>
            <p class="w-2/6 text-center">Files yang akan diupload</p>
            <div class="line w-2/6 h-1 bg-blue-400 rounded"></div>
        </div>
        @foreach ($prePostFiles as $key => $file)
                <div  class="w-full flex justify-between border shadow rounded my-2 p-2 items-center mx-auto">
                    <p class="">{{ $file->getClientOriginalName() }}</p>
                    <button type="button" wire:click.prevent="removePrePostFile({{$key}})" class="bg-red-200 text-red-400 text-2xl rounded-full p-2 flex justify-center items-center"><i class="fa-solid fa-circle-xmark"></i></button>
                </div>
        @endforeach
        @endif

        <div class="mb-6">
            <div class="batas w-full flex items-center">
                <div class="line w-2/6 h-1 bg-blue-400 rounded"></div>
                <p class="w-2/6 text-center">Files terkait postingan ini</p>
                <div class="line w-2/6 h-1 bg-blue-400 rounded"></div>
            </div>
            @if ($files->count() == 0)
                tidak ada files
            @else
            @foreach ($files as $file)
                <div  class="w-full flex justify-between border shadow rounded my-2 p-2 items-center mx-auto">
                    <p class="">{{ $file->title }}</p>
                    <button type="button" wire:click.prevent="removeFile({{$file->id}})" class="bg-red-200 text-red-400 text-2xl rounded-full p-2 flex justify-center items-center"><i class="fa-solid fa-circle-xmark"></i></button>
                </div>
            @endforeach
            @endif

        </div>

        <button type="button" wire:click.prevent="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit your post</button>
    </form>
</div>
