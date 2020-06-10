
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Alle Hobbies</div>

                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($hobbies as $hobby)
                                <li class="list-group-item">
                                    @if(file_exists("img/hobby/" . $hobby->id . "_thumb.jpg"))
                                    <a class="mr-1" title="Details anzeigen" href="/hobby/{{ $hobby->id }}">
                                        <img src="/img/hobby/{{ $hobby->id }}_thumb.jpg" alt="thumb"></a>
                                    @endif

                                    {{ $hobby->name }}

                                    <a class="ml-2" href="/hobby/{{ $hobby->id }}">Detailansicht</a>

                                    <span class="mx-2">Von <a href="/user/{{$hobby->user->id}}">{{ $hobby->user->name }}</a> ( {{ $hobby->user->hobbies->count() }} Hobbies)

                                    @if(file_exists("img/user/" . $hobby->user->id . "_thumb.jpg"))
                                        <a href="/user/{{ $hobby->user->id }}"><img class="rounded" src="/img/user/{{ $hobby->user->id }}_thumb.jpg" ></a>
                                    @endif
                                    </span>

                                    @can('update', $hobby)
                                    <a class="ml-2 btn btn-sm btn-outline-primary" href="/hobby/{{ $hobby->id }}/edit"><i class="fas fa-edit"></i> Bearbeiten</a>
                                    @endcan

                                    @can('delete', $hobby)
                                    <button onclick="confirm_delete('das Hobby','{{$hobby->name}}','hobby',{{$hobby->id}});" class="btn btn-sm btn-outline-danger ml-2">Löschen</button>
                                    @endcan

                                    <div class="float-right">{{ $hobby->created_at->diffForHumans() }}</div>
                                    <br>
                                    @foreach($hobby->tags as $tag)
                                        <a class="badge badge-{{$tag->style}}" href="/hobby/tag/{{ $tag->id }}">{{ $tag->name }}</a>
                                    @endforeach
                                </li>
                            @endforeach
                        </ul>
                        @auth
                        <a class="btn btn-success btn-sm mt-3" href="hobby/create"><i class="fas fa-plus-circle"></i> Neues Hobby anlegen</a>
                        @endauth
                        <div class="mt-3">
                            {{ $hobbies->links() }}
                        </div>
                    </div>
                </div>
            </div>
            @include( '_partials.loeschenFormular')
        </div>
    </div>
@endsection
