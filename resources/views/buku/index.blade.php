@extends('dashboard')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Buku Saya</h1>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('buku.create') }}" class="btn btnmd btn-success mb-3">Tambah Buku</a>
                        <div class="table-responsive p-0">
                            <table class="table table-hover text-no-wrap">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Judul Buku</th>
                                        <th class="text-center">Penulis</th>
                                        <th class="text-center">Status Buku</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no= 1;
                                    @endphp

                                    @php
                                        $user = auth()->id();
                                    @endphp
                                    @forelse ($buku->where('id_penerbit',$user) as $item)
                                    <tr>
                                        <td class="text-center">{{ $no }}</td>
                                        <td class="text-center">{{ $item->judul }}</td>
                                        <td class="text-center">{{ $item->penulis }}</td>
                                        <td class="text-center">{{ $item->status}}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('buku.destroy', $item->id_buku)}}" method="POST">
                                                <a href="{{route('buku.edit', $item->id_buku) }}" class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @php
                                    $no++;
                                    @endphp
                                    @empty
                                    <div class="alert alert-danger">
                                        Anda Belum Memiliki Data Buku
                                    </div>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        {{ $buku->links() }}
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection