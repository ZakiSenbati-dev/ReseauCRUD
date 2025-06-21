
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirmation of your account</title>
</head>
<body>
    <div class="container my-2">
        <img src="{{ $message->embed(public_path('logo.png')) }}"
        alt="Logo"
        style="display:block; margin:auto; width:300px; height:auto;">

        <h1 class="title p-1">Confirm your account</h1>
        <h3>Hello {{ $name }} / {{ $email }} </h3>

        <p class="p-1">
            Confirm you identity with our site.
            Before we can review your account, please click on the link below to
            help us verify your account.
        </p>
        <a href=" {{ $href }} " style="display:inline-block; padding:10px 20px; background-color:#0d6efd; color:#fff; text-decoration:none; border-radius:4px;">
        Confirm your account
        </a>
    </div>

</body>
</html>
