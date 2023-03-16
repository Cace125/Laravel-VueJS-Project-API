@extends("to-dos")

@section("content")

    <div class="w-96 border border-slate-600 rounded-md p-4 mx-auto mt-12 bg-gray-100">

        @if (session('success'))
            <h6 class="pt-2 w-full h-10 text-center text-green-700 bg-green-400 mb-4 rounded-sm">{{ session('success') }}</h6>
        @endif    

        <div class="mt-4">

            <h1 class="text-center mb-8 text-xl border-b pb-2 border-black">Tasks Pending</h1>

            @foreach ($todos as $todo)
                <div class="flex w-80 mx-auto pl-8 mb-4">
                    <div class="w-2/3">
                        <h4>{{ $todo -> title }}</h4>
                    </div>
                    <div class="w-1/3">
                        <form action="{{ route('todo-destroy', [$todo->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="text-center border border-red-800 bg-red-400 w-16 rounded-sm hover:text-white">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

@endsection
