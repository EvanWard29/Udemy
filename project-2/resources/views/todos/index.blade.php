@extends('layouts.app')

@section('content')
    @include('includes.locales')
    <?php
        use Carbon\Carbon;
        $carbonLocales = Carbon::getAvailableLocales();
    ?>

    <div class="row">
        <div class="col">
            <h1>Todos</h1>
        </div>
        <div class="col">
            {!! Form::open(['method'=>'POST', 'action'=>'TodosController@locale', 'class'=>'form pull-right']) !!}
                <div class='form-group'>
                    {!! Form::label('phpLocale', 'PHP Locale:') !!}
                    {!! Form::select('phpLocale', getPhpLocales(), 'en-GB') !!}
                </div>
                <div class='form-group'>
                    {!! Form::label('carbonLocale', 'Carbon Locale:') !!}
                    {!! Form::select('carbonLocale', $carbonLocales, '14') !!}
                </div>
                <div class='form-group'>
                    {!! Form::submit('SUBMIT', ['class'=>'btn btn-primary btn-xs pull-right']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>

    <div class="row">
        @if (count($todos) > 0)
            <?php
            //Set Locale for PHP & Carbon
            setlocale(LC_TIME, $phpLocale);

            Carbon::setLocale($carbonLocales[$carbonLocale]);
            Carbon::setUtf8(true); //Enable UTF-8 Characters for Carbon

            //Get locale of PHP & Carbon
            //echo "PHP: " . setlocale(LC_TIME, 0) ."<br>"; //Get PHP's locale
            //echo "Carbon: " . Carbon::getLocale(); //Get Carbon's locale
            ?>
            @foreach ($todos as $todo)
                <?php 
                    //Create new Carbon date from due date using new locale
                    $due = new Carbon($todo->due);
                ?>
                <div class="well">
                    <h3>
                        <a href="{{route('todo.show', $todo->id)}}">{{$todo->text}}</a>
                        
                        <!-- Original DateTime in UTC format -->
                        <span class="badge {{$due->lt(new Carbon()) ? 'bg-danger' : 'bg-info'}}">{{$due}}</span>

                        <!-- DateTime presented using localized string format -->
                        <span class="badge {{$due->lt(new Carbon()) ? 'bg-danger' : 'bg-info'}}">{{$due->formatLocalized('%a, %b %d, %Y, %H:%M %p')}}</span>

                        <!-- DateTime formatted to show AM or PM in UK standard -->
                        <span class="badge {{$due->lt(new Carbon()) ? 'bg-danger' : 'bg-info'}}">{{$due->formatLocalized('%d-%m-%Y %w:%M %p')}}</span>

                        <!-- DateTime formatted in US standard with AM/PM -->
                        <span class="badge {{$due->lt(new Carbon()) ? 'bg-danger' : 'bg-info'}}">{{$due->formatLocalized('%m-%d-%Y %w:%M %p')}}</span>

                        <!-- DateTime presented as Difference For Humans using selected locale -->
                        <span class="badge {{$due->lt(new Carbon()) ? 'bg-danger' : 'bg-info'}}">{{$due->diffForHumans()}}</span>

                        <!-- DateTime Formatted to show "Name of Day | Day | Name of Month | Year" using selected locale -->
                        <span class="badge {{$due->lt(new Carbon()) ? 'bg-danger' : 'bg-info'}}">{{$due->formatLocalized('%A %d %B %Y')}}</span>
                    </h3>
                </div>
            @endforeach
        @endif
    </div>
@endsection