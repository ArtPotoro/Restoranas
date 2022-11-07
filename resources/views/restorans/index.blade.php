@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Restorans</div>

                    <div class="card-body">
                        <a href="{{ route('restoran.create') }}" class="btn btn-success">Pridėti naują</a>

                        <table class="table">
                            <thead>
                            <tr>
                                <th>Pavadinimas</th>
                                <th>Adresas</th>
                                <th>Miestas</th>
                                <th>Darbo laikas</th>
                                <th colspan="2">Veiksmai</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($restorans as $restoran)
                                <tr>
                                    <td>{{ $restoran->name }}</td>
                                    <td>{{ $restoran->address }}</td>
                                    <td>{{ $restoran->city }}</td>
                                    <td>{{ $restoran->hours }}</td>

                                    <td>
                                        <a href="{{ route('restoranMeals',$restoran->id) }}" class="btn btn-success">Patiekalai</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('restoran.edit', $restoran->id) }}" class="btn btn-success">Redaguoti</a>
                                    </td>
                                    <td>
                                        <form method="post" action="{{ route('restoran.destroy', $restoran->id) }}">
                                            @csrf
                                            @method('delete')
                                            <button  class="btn btn-danger">Ištrinti</button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
