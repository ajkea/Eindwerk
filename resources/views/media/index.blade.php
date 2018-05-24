<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    </head>
    <body>
        <h1>Index media</h1>
        @foreach ($media as $mediaItem)
        <div class="row">
            <img style="max-width: 20%" src="{{ URL::to('/images/upload/').'/'.$mediaItem->source }}" alt="image {{ $mediaItem->source }}">
        </div>
        @endforeach
    </body>
</html>
