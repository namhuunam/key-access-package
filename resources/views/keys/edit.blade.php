@extends(backpack_view('layouts.top_left'))

@section('header')
    <h1 class="mb-0">Sửa Key</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <form action="{{ backpack_url('keys/' . $key->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="key_value">Key</label>
                            <input type="text" name="key_value" id="key_value" class="form-control" value="{{ $key->key_value }}" required>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Lưu</button>
                        <a href="{{ backpack_url('keys') }}" class="btn btn-secondary">Hủy</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
