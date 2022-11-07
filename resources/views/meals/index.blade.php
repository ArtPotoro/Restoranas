@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Prtiekalai</div>

                    <div class="card-body">
                        <a href="{{ route('meals.create') }}" class="btn btn-success">Pridėti naują</a>

                        <table class="table">
                            <thead>
                            <tr>
                                <th>Pavadinimas</th>
                                <th>Nuotrauka</th>
                                <th>Kaina</th>
                                <th>Restoranas</th>
                                <th colspan="2">Veiksmai</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($meals as $meal)
                                <tr>
                                    <td>{{ $meal->mealName }}</td>
                                    <td>
                                        @if ($meal->image!=null)
                                            <img src="{{route('meals.update',$meal->id)}}" style="width: 200px;">
                                        @endif
                                    </td>

                                    <td>{{ $meal->price }}</td>
                                    <td>{{ $meal->restoran->name }}</td>
                                    <td>
                                        <a href="{{ route('meals.edit', $meal->id) }}" class="btn btn-success">Redaguoti</a>


                                    </td>
                                    <td>
                                        <form method="post" action="{{ route('meals.destroy', $meal->id) }}">
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
