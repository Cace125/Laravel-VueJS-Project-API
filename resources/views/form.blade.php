@extends("to-dos")

@section("content")
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <div class="w-96 border border-slate-600 rounded-md p-4 mx-auto mt-12 bg-gray-100">
        
        <form action="{{ route('form') }}" method="POST">
            @csrf

            @if (session('success'))
                <h6 class="pt-2 w-full h-10 text-center text-green-700 bg-green-400 mb-4 rounded-sm">{{ session('success') }}</h6>
            @endif

            @error('title')
                <h6 class="pt-2 w-full h-10 text-center text-red-700 bg-red-400 mb-4 rounded-sm">{{ $message }}</h6>
            @enderror

            <div class="mb-8 pl-6">
                <label for="title" class="text-lg">Task's name:</label>
                <input type="text" name="title" class="border border-slate-400 ml-4 text-center rounded-sm border-dotted">
            </div>
            <button type="submit" class="h-8 w-16 rounded-md ml-36 border-2 border-blue-800 bg-blue-400 hover:text-white hover:bg-blue-900">Save</button>
        </form>
        
    </div>

    <script>window.Laravel = {csrfToken: '{{ csrf_token() }}'}</script>

@endsection