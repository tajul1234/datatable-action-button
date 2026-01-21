<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <nav class="shadow-md py-4">
        <div class="flex justify-center space-x-12 text-2xl text-gray-800">
            <a href="{{route('home')}}" wire:navigate class="hover:text-blue-600" wire:current="bg-green-800 font-bold px-4 py-1 text-white">Home</a>
            <a href="{{route('about')}}" wire:navigate class="hover:text-blue-600"  wire:current="bg-green-800 font-bold px-4 py-1 text-white">About</a>
            <a href="{{route('contact')}}" wire:navigate class="hover:text-blue-600"  wire:current="bg-green-800 font-bold px-4 py-1 text-white">Contact</a>

        </div>

    </nav>
</body>
</html>
