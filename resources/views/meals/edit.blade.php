@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Patiekalai</div>

                    <div class="card-body">

                        <form method="POST" action="{{ isset($meal)?route('meals.update',$meal->id):route('meals.store') }}">
                            @csrf

                            @if (isset($meal))
                                @method('put')
                            @endif

                            <div class="mb-3">
                                <label class="form-label">Pavadinimas</label>
                                <input type="text" name="mealName" class="form-control" value="{{ isset($meal)?$meal->mealName:'' }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nuotrauka</label>
                                <input type="file" name="image" class="form-control"  value="{{ isset($meal)?$meal->image:'' }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kaina</label>
                                <input type="text" name="price" class="form-control"  value="{{ isset($meal)?$meal->price:'' }}">
                            </div>
                            <div class="mb-3">
                                <select name="restoran_id" class="form-select">
                                    @foreach($restorans as $restoran)
                                        <option  value="{{$restoran->id}}" {{ isset($meal)&&($restoran->id==$meal->restoran_id)?'selected':'' }}> {{ $restoran->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success">{{ isset($meal)?'Išsaugoti':'Pridėti' }}</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
