@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center pt-5">
    <div class="row">
        <div class="col">
            <div class="card">
                <h3 class="card-header text-center">Tambah Data Pertandingan</h3>
                <div class="card-body">
                    <form action="{{ url('addClub') }}" method="POST">
                        @csrf
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
                        <table id="table" class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Nama Club</th>
                                    <th scope="col">Kota</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <input type="text" class="form-control" name="namaClub" placeholder="Nama Club" aria-label="Nama Club">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="kota" placeholder="Kota Club" aria-label="Kota Club">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button type="submit" class="btn btn-primary text-center">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container pt-5">
    <div class="row">
        <div class="col">
            <div class="card">
                <h3 class="card-header text-center">Tambah Data Pertandingan</h3>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Nama Club</th>
                                <th scope="col">Kota</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $no = 1; @endphp
                        @foreach($dataClub as $data)
                            <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <td>{{ $data->namaClub }}</td>
                                <td>{{ $data->kota }}</td>
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