<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" contet="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    
    <title>To Do's</title>
</head>
<body>

    <nav class="pt-6 h-16 bg-gray-200">
        <div class="flex w-96 justify-evenly text-xl">
            <h1 class="text-slate-900">To Do's</h1>
            <div id="navbar">
                <ul class="flex w-48 justify-evenly text-lg">
                    <li>
                        <a href="/form" class="text-slate-900 hover:text-slate-400">Form</a>
                    </li>
                    <li>
                        <a href="/list" class="text-slate-900 hover:text-slate-400">List</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield("content")

</body>
</html>