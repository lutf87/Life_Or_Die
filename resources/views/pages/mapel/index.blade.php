@extends('templates.master')
@section('title', 'Mapel')
@section('sub-title', 'Mata Pelajaran')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card card-success card-outline">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="col-auto">
                            <a href="{{ route('mapel.create') }}" class="btn btn-success btn-md" tabindex="-1" role="button"
                                aria-disabled="true">Tambah Data</a>
                        </div>

                        <div class="p-2 ml-auto">
                            <div class="row">
                                <div class="col">
                                    <input type="text" name="keyword" id="keyword" class="form-control"
                                        placeholder="ketik keyword disini" style="width: 200px">
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-primary">
                                        Cari
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Mapel</th>
                                    <th>Nama Mapel</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($mapel as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->kode_mapel }}</td>
                                        <td>{{ $item->nama_mapel }}</td>
                                        <td>
                                            <form action="#" onsubmit="return confirm('Apakah Anda Yakin ?')"
                                                method="post">
                                                <a href="#" class="btn btn-sm btn-primary">Edit</a>
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data Mata Pelajaran belum Tersedia!
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{-- {{ $mapels->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        @if (session()->has('success'))

            toastr.success('{{ session('success') }}', 'BERHASIL!');
        @elseif (session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!');
        @endif
    </script>
@endsection
