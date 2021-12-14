@extends('layouts.app')

@section('content')
    <?php
        use Carbon\Carbon;

        setlocale(LC_TIME, config('app.locale')); //Set PHP's locale to app's locale
        Carbon::setUtf8(true); //Enable UTF-8 Characters for Carbon

        //Set Carbon's locale to app's language locale - Carbon only recognises base locale code so using 'substr' to get the first two characters of the code. 
        //Eg. It will only recognise 'de' (German) rather than 'de-DE' (German-Germany).
        Carbon::setLocale(substr(config('app.locale'), 0, 2));

        /*echo "PHP: " . setlocale(LC_TIME, 0) ."<br>"; //Get PHP's locale
        echo "Carbon: " . Carbon::getLocale(); //Get Carbon's locale
        
        echo "<br>";
        echo Carbon::now()->format('l j F Y H:i:s'); //English format
        echo "<br>";
        echo (string) (new Carbon())->formatLocalized('%A %d %B %Y'); //Format using set locale: Name of Day | Day | Name of Month | Year
        echo "<br>";*/

        $due = new Carbon($todo->due);
        //echo $due;
        echo implode(', ', array_slice(Carbon::getAvailableLocales(), 0));
        echo "<br>";
    ?>
    <a href="{{route('todo.index')}}" class="btn btn-default">Go Back</a>

    <h1>{{$todo->text}}</h1>
    <div class="badge {{$due->lt(new Carbon()) ? 'bg-danger' : 'bg-info'}}">{{$due->diffForHumans()}}</div>
    <div class="badge bg-primary">{{$due->formatLocalized('%A %d %B %Y')}}</div>
        
    <hr>

    <p>{{$todo->body}}</p>

    <a href="{{route('todo.edit', $todo->id)}}" class="btn btn-primary">Edit</a>
    
    {!! Form::open(['method'=>'DELETE', 'class'=>'pull-right', 'action'=> ['TodosController@destroy', $todo->id]]) !!}
        <div class='form-group'>
            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
        </div>
    {!! Form::close() !!}

@endsection