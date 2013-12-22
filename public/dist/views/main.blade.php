<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Join the Resistance</title>
    <link rel='stylesheet' href='dist/app.css'/>
</head>
 
<body>
    <h1 id='body-title'>The Resistance</h1>
    <div class='container'>
        {{ $content }}
        <div class='row'>
            <div class='col-md-4 col-md-offset-4'>
                @if(Session::has('message'))
                    <div class='errors'>
                        <p>{{ Session::get('message') }}</p>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
</body>
</html>