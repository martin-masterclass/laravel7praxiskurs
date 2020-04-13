
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
                        <div class="row">
                            <div class="col-md-9">
                                <p><b>{{ $hobby->name }}</b></p>
                                <p>{{ $hobby->beschreibung }}</p>

                                @if($hobby->tags->count() > 0)
                                    <p>
                                        <b>Verknüpfte Tags:</b> (klicken, zum entfernen)<br>
                                        @foreach($hobby->tags as $tag)
                                            <a class="badge badge-{{$tag->style}}" href="/hobby/{{$hobby->id}}/tag/{{$tag->id}}/detach">{{ $tag->name }}</a>
                                        @endforeach
                                    </p>
                                @endif

                                <p>
                                    <b>Verfügbare Tags:</b> (klicken, zum hinzufügen)<br>
                                    @foreach($verfuegbareTags as $tag)
                                        <a class="badge badge-{{$tag->style}}" href="/hobby/{{$hobby->id}}/tag/{{$tag->id}}/attach">{{ $tag->name }}</a>
                                    @endforeach
                                </p>
                            </div>
                            <div class="col-md-3">
                                <a href="/img/400x300.jpg" data-lightbox="400x300.jpg" data-title="{{ $hobby->name }}">
                                    <img class="img-fluid" src="/img/400x300.jpg" alt="">
                                </a>
                                <i class="fa fa-search-plus"></i> Bild anklicken zum Vergrößern
                            </div>
                        </div>

                        <a class="btn btn-success btn-sm mt-3" href="/hobby"><i class="fas fa-arrow-circle-up"></i> Zurück zur Übersicht</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
