@extends('layouts.app')

@section('content')
<div class="container pt-5">
    <div class="row pb-4">
        <div class="col">
            <button class="btn btn-success" type="submit">
                <a href="{{ url('add') }}" class="text-white text-decoration-none">+Add Pertandingan</a>
            </button>
        </div>
    </div>
    @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            @if(Session::has('success'))
                                <div class="alert alert-success text-center">
                                    <p>{{ Session::get('success') }}</p>
                                </div>
                            @endif
    <div class="row">
        <div class="col">
            
            <div class="card">
                <h3 class="card-header text-center">Kalasemen</h3>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Club</th>
                                <th scope="col">Main</th>
                                <th scope="col">Menang</th>
                                <th scope="col">Seri</th>
                                <th scope="col">Kalah</th>
                                <th scope="col">GM</th>
                                <th scope="col">GK</th>
                                <th scope="col">Point</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach($dataPertandinganAll as $data)
                                <tr>
                                    <th scope="row">{{ $no++ }}</th>
                                    <td>{{ $data->namaClub }}</td>
                                    <td>{{ $data->ma }}</td>
                                    <td>{{ $data->me }}</td>
                                    <td>{{ $data->s }}</td>
                                    <td>{{ $data->k }}</td>
                                    <td>{{ $data->gm }}</td>
                                    <td>{{ $data->gk }}</td>
                                    <td>{{ $data->point }}</td>
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