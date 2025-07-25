
<!--master layout:  overall structure of the web pages-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>Publify | {{$title}}</title>
</head>

<body>
    @include('partials.nav')

    <main>
        <div class="container">
            <div class="row my-3">
                @include('partials.flashbag')
            </div>


            {{$slot}}
        </div>

    </main>


    @include('partials.footer')



</body>
</html>
