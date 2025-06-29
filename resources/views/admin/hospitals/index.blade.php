@extends('layouts.admin')

@section('title', 'Kelola Hospital')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Hospital</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.hospitals.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Tambah Hospital
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Tipe</th>
                                    <th>Alamat</th>
                                    <th>Telepon</th>
                                    <th>Featured</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($hospitals as $hospital)
                                <tr>
                                    <td>{{ $hospital->id }}</td>
                                    <td>{{ $hospital->name }}</td>
                                    <td>
                                        <span class="badge badge-info">{{ $hospital->type_label }}</span>
                                    </td>
                                    <td>{{ Str::limit($hospital->address, 50) }}</td>
                                    <td>{{ $hospital->phone }}</td>
                                    <td>
                                        @if($hospital->featured)
                                            <span class="badge badge-warning">Featured</span>
                                        @else
                                            <span class="badge badge-secondary">Normal</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($hospital->active)
                                            <span class="badge badge-success">Aktif</span>
                                        @else
                                            <span class="badge badge-danger">Nonaktif</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('admin.hospitals.show', $hospital) }}" class="btn btn-info btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.hospitals.edit', $hospital) }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.hospitals.destroy', $hospital) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center">Tidak ada data hospital</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{ $hospitals->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection