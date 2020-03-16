
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Alle Hobbies</div>

                    <div class="card-body">

                        <form>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="beschreibung">Beschreibung</label>
                                <textarea class="form-control" id="beschreibung" name="beschreibung" rows="5"></textarea>
                            </div>
                            <input class="btn btn-primary mt-4" type="submit" value="absenden">
                        </form>


                        <a class="btn btn-primary btn-sm mt-3 float-right" href="/hobby"><i class="fas fa-arrow-circle-up"></i> Zurück</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
