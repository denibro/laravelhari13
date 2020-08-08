@extends('adminlte.master')

@section('content')
      <div class="ml-2 mt-2">
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Pertanyaan dengan ID : {{ $post->id }}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="/pertanyaan/{{ $post->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="judul">Judul Pertanyaan</label>
                    <input type="text" class="form-control" id="judul" placeholder="Enter judul" name="judul" value="{{ old('judul',$post->judul) }}">
                    @error('judul')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="isi">Isi</label>
                    <input type="text" class="form-control" id="isi" placeholder="Enter isi" name="isi" value="{{ old('isi',$post->isi) }}">
                    @error('isi')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Edit Pertanyaan</button>
                </div>
              </form>
    </div>    
      </div>
		
@endsection