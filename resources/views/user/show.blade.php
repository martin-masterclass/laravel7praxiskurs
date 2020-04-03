
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
                        <a class="btn btn-success btn-sm mt-3" href="{{ URL::previous() }}"><i class="fas fa-arrow-circle-up"></i> Zurück zur Übersicht</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
