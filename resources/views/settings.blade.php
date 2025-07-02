@extends(backpack_view('layouts.top_left'))

@section('header')
    <h1 class="mb-0">Cài đặt Key Access</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ backpack_url('key-access-settings') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-header">Cài đặt Session</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="session_lifetime">Session Lifetime</label>
                            <input type="number" name="session_lifetime" id="session_lifetime" class="form-control" value="{{ $settings['session_lifetime'] ?? 15 }}">
                            <small class="form-text text-muted">Thời gian (phút) session được ghi nhớ sau khi đóng trình duyệt.</small>
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="session_expire_on_close" value="1" @if(old('session_expire_on_close', $settings['session_expire_on_close'] ?? 0) == 1) checked @endif>
                                    Expire on Close
                                </label>
                            </div>
                            <small class="form-text text-muted">Hết hạn session ngay khi đóng trình duyệt.</small>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
