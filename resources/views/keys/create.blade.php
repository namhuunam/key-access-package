@extends(backpack_view('layouts.top_left'))

@section('header')
    <h1 class="mb-0">Thêm Key mới</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <form action="{{ backpack_url('keys') }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="key_value">Key</label>
                            <div class="input-group">
                                <input type="text" name="key_value" id="key_value" class="form-control" required>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-secondary" onclick="generateKey()">Tạo ngẫu nhiên</button>
                                </div>
                            </div>
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

@push('after_scripts')
    <script>
        function generateKey() {
            const chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            let result = '';
            for (let i = 12; i > 0; --i) result += chars[Math.floor(Math.random() * chars.length)];
            document.getElementById('key_value').value = result;
        }
    </script>
@endpush
