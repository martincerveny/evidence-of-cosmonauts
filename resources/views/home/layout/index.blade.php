@extends('master.layout.index')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <h2>Zoznam kozmonautov</h2>
                <br>
                <p>
                    <a class="btn btn-success" href="{{ route('cosmonaut.create') }}" role="button">Pridať kozmonauta</a>
                </p>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Meno</th>
                            <th scope="col">Priezvisko</th>
                            <th scope="col">Dátum narodenia</th>
                            <th scope="col">Superschopnosť</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cosmonautItems as $cosmonautItem)
                            <tr>
                                <th scope="row">{{ $cosmonautItem->getId() }}</th>
                                <td>
                                    <a href="{{ route('cosmonaut.show', $cosmonautItem->getId()) }}">{{ $cosmonautItem->getName() }}</a>
                                </td>
                                <td>{{ $cosmonautItem->getSurname() }}</td>
                                <td>{{ date('d.m.Y', strtotime($cosmonautItem->getDateOfBirth())) }}</td>
                                <td>{{ $cosmonautItem->getSuperpower() }}</td>
                                <td>
                                    <a class="btn btn-primary"
                                       href="{{ route('cosmonaut.show', $cosmonautItem->getId()) }}"><i
                                            class="fas fa-eye"></i></a>
                                    <a class="btn btn-warning"
                                       href="{{route('cosmonaut.edit', $cosmonautItem->getId())}}"><i
                                            class="fas fa-edit"></i></a>
                                    <a class="btn btn-danger"
                                       onclick="return confirm('Chcete zmazať tohto kozmonauta?')"
                                       href="{{route('cosmonaut.delete', $cosmonautItem->getId())}}"><i
                                            class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
