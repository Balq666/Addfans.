<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="content-form w-full h-screen flex items-center justify-center">
        <div class="shadow-lg xl:w-1/4 lg:w-1/4 md:w-2/5 sm:w-2/5 w-4/5 rounded-xl">

            <form action="" method="post" class=" bg-white  shadow-inner rounded-xl p-2">
                <h1 class="text-center text-2xl font-medium">Register customer</h1>
                <hr class="my-2">
                @csrf
                <div class=" w-4/5 my-3 rounded mx-auto">
                    <input type="text" class="block w-full p-2 border rounded" name="name" value="{{old('name')}}" placeholder="Name">
                    @error('name')
                        <p class="text-sm w-full mx-auto font-medium text-red-500">{{$message}}</p>
                    @enderror
                </div>
                <div class=" w-4/5 my-3 rounded mx-auto">
                    <input type="text" class="block w-full p-2 border rounded" name="username" value="{{old('username')}}" placeholder="Username">
                    @error('username')
                        <p class="text-sm w-full mx-auto font-medium text-red-500">{{$message}}</p>
                    @enderror
                </div>
                <div class=" w-4/5 my-3 rounded mx-auto">
                    <input type="email" class="block w-full p-2 border rounded" name="email" value="{{old('email')}}" placeholder="Email">
                    @error('email')
                        <p class="text-sm w-full mx-auto font-medium text-red-500">{{$message}}</p>
                    @enderror
                </div>
                <div class=" w-4/5 my-3 rounded mx-auto">
                    <input type="password" class="block w-full p-2 border rounded" name="password" placeholder="Password">
                    @error('password')
                        <p class="text-sm w-full mx-auto font-medium text-red-500">{{$message}}</p>
                    @enderror
                </div>
                <div class=" w-4/5 my-3 rounded mx-auto">
                    <button class="block p-2 w-3/5 text-white bg-blue-400 hover:bg-blue-500 mx-auto rounded mb-2 mt-2 font-medium" type="submit">Submit</button>
                </div>
                <p class="font-medium text-center mb-2">Sudah daftar? <a href="/login" class="text-blue-500 underline">Login!</a></p>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
