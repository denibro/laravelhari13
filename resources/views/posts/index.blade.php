@extends('adminlte.master')

@section('content')
  <div class="ml-3 mt-3">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabel Pertanyaan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @if(session('success'))
                  <div class="alert alert-success">
                    {{ session('success') }}
                  </div>
                @endif
                <a href="/pertanyaan/create" class="btn btn-primary">Buat Pertanyaan Baru</a>
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Pertanyaan</th>
                      <th>Isi</th>
                      <th style="width: 40px">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($posts as $key => $post)
                      <tr>
                      <td>{{ $key + 1 }}</td>
                      <td>{{ $post->judul }}</td>
                      <td>{{ $post->isi }}</td>
                      <td style="display: flex">
                        <a href="/pertanyaan/{{ $post->id }}" class="btn btn-info btn-sm">Show</a>
                        <a href="/pertanyaan/{{ $post->id }}/edit" class="btn btn-primary btn-sm">Edit</a>
                        <form action="/pertanyaan/{{ $post->id }}" method="post">
                          @csrf
                          @method('DELETE')
                            <input type="submit" value="delete" class="btn btn-danger btn-sm">
                         </form>
                      </td>
                    </tr>
                    @empty
                      <tr>
                        <td colspan="4" align="center">Tidak ada Data</td>
                      </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>

            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>    
  </div>	
@endsection