<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
        <h1 class="text-2xl mb-2">Create post</h1>
        <hr class="my-2">
        <form action="/posts/create" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Type your title here</label>
                <input type="title" name="title" id="title" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" value="{{old('title')}}" wire:model="title">
                @error('title')
                <p class="text-red-600 text-sm font-medium">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="slug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Type your slug here</label>
                <input type="slug" name="slug" id="slug" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" value="{{old('title')}}" wire:model="slug" >
                @error('slug')
                <p class="text-red-600 text-sm font-medium">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Type your price here</label>
                <input type="number" name="price" id="price" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" value="{{old('price')}}" wire:model="price">
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
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Type your description here</label>
                <textarea type="text" name="description" id="description" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" value="{{old('description')}}">
                </textarea>
                @error('description')
                <p class="text-red-600 text-sm font-medium">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="thumbnail" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Drop your thumbnail here</label>
                <input type="file" name="thumbnail" id="thumbnail" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" >
                @error('thumbnail')
                <p class="text-red-600 text-sm font-medium">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="files" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Drop your files here</label>
                <input type="file" name="files[]" id="files" multiple class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" >
                @error('files')
                <p class="text-red-600 text-sm font-medium">{{$message}}</p>
                @enderror
            </div>
        
            <button type="submit" class="text-white  font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 @if($lessThan) bg-blue-200 @else bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 @endif" @if($lessThan)
                disabled
            @endif>Submit your post</button>
        </form>
</div>
