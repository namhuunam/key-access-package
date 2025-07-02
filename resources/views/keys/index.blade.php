@extends(backpack_view('layouts.top_left'))

@section('header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mb-0">Quản lý Keys</h1>
        <a href="{{ backpack_url('keys/create') }}" class="btn btn-primary"><i class="la la-plus"></i> Thêm Key</a>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card">
                <div class="card-body p-0">
                    <table class="table table-striped mb-0">
                        <thead>
                            <tr>
                                <th>Key</th>
                                <th>Ngày tạo</th>
                                <th class="text-right">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($keys as $key)
                                <tr>
                                    <td>{{ $key->key_value }}</td>
                                    <td>{{ $key->created_at }}</td>
                                    <td class="text-right">
                                        <a href="{{ backpack_url('keys/' . $key->id . '/edit') }}" class="btn btn-sm btn-link"><i class="la la-edit"></i> Sửa</a>
                                        <form action="{{ backpack_url('keys/' . $key->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-link text-danger"><i class="la la-trash"></i> Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
