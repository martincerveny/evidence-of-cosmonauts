@extends('master.layout.index')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="{{ route('cosmonaut.index') }}"><i class="fas fa-angle-left"></i> Naspäť</a>
                <br>
                <br>
                <h2>Profil kozmonauta</h2>
                <br>
                <div class="card">
                    <div class="card-header">
                        <strong>
                            {{ $cosmonautItem->getName() . ' ' . $cosmonautItem->getSurname() }}
                        </strong>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                            <tr>
                                <th scope="col">#ID</th>
                                <td scope="row">{{ $cosmonautItem->getId() }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Meno</th>
                                <td>{{ $cosmonautItem->getName() }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Priezvisko</th>
                                <td>{{ $cosmonautItem->getSurname() }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Dátum narodenia</th>
                                <td>{{ date('d.m.Y', strtotime($cosmonautItem->getDateOfBirth())) }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Superschopnosť</th>
                                <td>{{ $cosmonautItem->getSuperpower() }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
