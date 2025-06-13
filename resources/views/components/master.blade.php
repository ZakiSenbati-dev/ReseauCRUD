
<!--master layout:  overall structure of the web pages-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
/>
    <title>GOAT | {{$title}}</title>
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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">

    </script>
</body>
</html>
