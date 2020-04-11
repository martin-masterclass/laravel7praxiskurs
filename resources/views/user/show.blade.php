
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">User Detailansicht</div>

                    <div class="card-body">
                        <h3>{{$user->name}}</h3>
                        <p><b>Motto: {{$user->motto}}</b></p>
                        <p>{{ $user->ueber_mich }}</p>
                        <h5>Hobbies von {{ $user->name }}</h5>
                        @if($user->hobbies->count() > 0)
                        <ul class="list-group">
                            @foreach($user->hobbies as $hobby)
                                <li class="list-group-item">{{ $hobby->name }} <a class="ml-2" href="/hobby/{{ $hobby->id }}">Detailansicht</a>

                                    <div class="float-right">{{ $hobby->created_at->diffForHumans() }}</div>
                                    <br>
                                    @foreach($hobby->tags as $tag)
                                        <a class="badge badge-{{$tag->style}}" href="/hobby/tag/{{ $tag->id }}">{{ $tag->name }}</a>
                                    @endforeach
                                </li>
                            @endforeach
                        </ul>
                        @else()
                        <p>{{ $user->name }} hat noch keine Hobbies angelegt.</p>
                        @endif

                        <a class="btn btn-success btn-sm mt-3" href="{{ URL::previous() }}"><i class="fas fa-arrow-circle-up"></i> Zurück zur Übersicht</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
