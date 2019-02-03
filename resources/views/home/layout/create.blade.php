@extends('master.layout.index')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="{{ route('cosmonaut.index') }}"><i class="fas fa-angle-left"></i> Naspäť</a>
                <br>
                <br>
                <h2>Vytvoriť kozmonauta</h2>
                <br>
                <form action="{{ route('cosmonaut.store') }}" method="post">
                    {{ csrf_field() }}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="name">Meno:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                               placeholder="Zadajte meno" required>
                    </div>
                    <div class="form-group">
                        <label for="surname">Priezvisko:</label>
                        <input type="text" class="form-control" id="surname" name="surname" value="{{ old('surname') }}"
                               placeholder="Zadajte priezvisko" required>
                    </div>
                    <div class="form-group">
                        <label for="date_of_birth">Dátum narodenia:</label>
                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth"
                               value="{{ old('date_of_birth') }}" placeholder="Zadajte dátum narodenia" required>
                    </div>
                    <div class="form-group">
                        <label for="superpower">Superschopnosť:</label>
                        <input type="text" class="form-control" id="superpower" name="superpower"
                               value="{{ old('superpower') }}" placeholder="Zadajte superschopnosť :)" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Uložiť</button>
                </form>
            </div>
        </div>
    </div>
@endsection
