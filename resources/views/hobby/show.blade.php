
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Hobby Detailansicht
                        <div class="float-right"><a href="/user/{{$hobby->user->id}}">{{$hobby->user->name}}</a></div>
                    </div>

                    <div class="card-body">
                        <p><b>{{ $hobby->name }}</b></p>
                        <p>{{ $hobby->beschreibung }}</p>
                        <p>
                            <b>Verknüpfte Tags:</b> (klicken, zum entfernen)
                            @foreach($hobby->tags as $tag)
                                <a class="badge badge-{{$tag->style}}" href="/hobby/{{$hobby->id}}/tag/{{$tag->id}}/detach">{{ $tag->name }}</a>
                            @endforeach
                        </p>
                        <p>
                            <b>Verfügbare Tags:</b> (klicken, zum hinzufügen)
                            @foreach($verfuegbareTags as $tag)
                                <a class="badge badge-{{$tag->style}}" href="/hobby/{{$hobby->id}}/tag/{{$tag->id}}/attach">{{ $tag->name }}</a>
                            @endforeach
                        </p>
                        <a class="btn btn-success btn-sm mt-3" href="{{ URL::previous() }}"><i class="fas fa-arrow-circle-up"></i> Zurück zur Übersicht</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
