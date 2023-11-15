@extends('dashboard')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Pinjam Buku</h1>
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
                        <div class="table-responsive p-0">
                            <table class="table table-hover text-no-wrap">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Judul Buku</th>
                                        <th class="text-center">Pengarang</th>
                                        <th class="text-center">Penerbit</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no= 1;
                                    @endphp

                                    @forelse ($pinjamBuku as $item)
                                    <tr>
                                        <td class="text-center">{{ $no }}</td>
                                        <td class="text-center">{{ $item->judul }}</td>
                                        <td class="text-center">{{ $item->penulis }}</td>
                                        <td class="text-center">{{ $item->status}}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{route('pinjamBuku.update', $item->id_buku) }}" method="POST">
                                                <button class="btn"><i class="fa fa-plus"></i></button>
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
                        {{ $pinjamBuku->links() }}
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