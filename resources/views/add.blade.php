@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center pt-5">
    <div class="row">
        <div class="col">
            <div class="card">
                <h3 class="card-header text-center">Tambah Data Pertandingan</h3>
                <div class="card-body">
                    <form action="{{ url('add') }}" method="POST">
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
                                    <th scope="col">Club</th>
                                    <th scope="col">Skor</th>
                                    <th>VS</th>
                                    <th scope="col">Club</th>
                                    <th scope="col">Skor</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                    <select class="form-select" name="inputs[0][namaClub]" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        @foreach($dataClub as $data)
                                            <option value="{{ $data->namaClub }}">{{ $data->namaClub }}</option>
                                        @endforeach
                                    </select>
                                        <!-- <input type="text" class="form-control" name="inputs[0][namaClub]" placeholder="Nama Club" aria-label="Nama Club"> -->
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="inputs[0][skor]" placeholder="Skor" aria-label="Skor">
                                    </td>
                                    <td>VS</td>
                                    <td>
                                        <select class="form-select" name="inputs[0][namaClub2]" aria-label="Default select example">
                                            <option selected>Open this select menu</option>
                                            @foreach($dataClub as $data)
                                                <option value="{{ $data->namaClub }}">{{ $data->namaClub }}</option>
                                            @endforeach
                                        </select>
                                        <!-- <input type="text" class="form-control" name="inputs[0][namaClub2]" placeholder="Nama Club2" aria-label="Nama Club2"> -->
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="inputs[0][skor2]" placeholder="Skor2" aria-label="Skor2">
                                    </td>
                                    <td>
                                        <button type="button" name="add" id="add" class="btn btn-success">+</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="d-grid gap-2 col-6 mx-auto pt-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
      var i = 0;
      $('#add').click(function () {
          ++i;
          $('#table').append('<tr><td><select class="form-select" name="inputs['+i+'][namaClub]" aria-label="Default select example"><option selected>Open this select menu</option>@foreach($dataClub as $data)<option value="{{ $data->namaClub }}">{{ $data->namaClub }}</option>@endforeach</select></td><td><input type="number" name="inputs['+i+'][skor]" placeholder="Skor" class="form-control" /></td><td>VS</td><td><select class="form-select" name="inputs['+i+'][namaClub2]" aria-label="Default select example"><option selected>Open this select menu</option>@foreach($dataClub as $data)<option value="{{ $data->namaClub }}">{{ $data->namaClub }}</option>@endforeach</select></td><td><input type="number" name="inputs['+i+'][skor2]" placeholder="Skor2" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-input-field">Delete</button></td></tr>');
      });

      $(document).on('click', '.remove-input-field', function () {
          $(this).parents('tr').remove();
      });
  </script>
@endsection