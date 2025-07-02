<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác thực quyền truy cập</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background: #111827;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #f9fafb;
        }
        .lock-screen {
            text-align: center;
            padding: 40px;
            max-width: 400px;
            width: 90%;
        }
        .logo {
            max-width: 250px;
            margin-bottom: 40px;
        }
        h1 {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 10px;
        }
        p {
            font-size: 16px;
            color: #9ca3af;
            margin-bottom: 30px;
        }
        .input-group {
            position: relative;
            display: flex;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.2), 0 8px 10px -6px rgba(0, 0, 0, 0.2);
        }
        input[type="text"] {
            flex-grow: 1;
            padding: 15px 20px;
            border: 1px solid #374151;
            background-color: #1f2937;
            color: #f9fafb;
            border-radius: 8px 0 0 8px;
            font-size: 16px;
            outline: none;
            transition: border-color 0.3s;
        }
        input[type="text"]::placeholder {
            color: #6b7280;
        }
        input[type="text"]:focus {
            border-color: #4f46e5;
        }
        button {
            padding: 15px 30px;
            border: none;
            background: linear-gradient(to right, #6366f1, #8b5cf6);
            color: white;
            border-radius: 0 8px 8px 0;
            cursor: pointer;
            font-size: 16px;
            font-weight: 500;
            transition: background 0.3s;
        }
        button:hover {
            background: linear-gradient(to right, #4f46e5, #7c3aed);
        }
        .error-message {
            color: #f87171;
            margin-top: 20px;
            font-size: 14px;
            height: 20px;
        }
    </style>
</head>
<body>
    <div class="lock-screen">
        <img src="{{ asset('logo.png') }}" alt="Logo" class="logo">
        <h1>Yêu cầu xác thực</h1>
        <p>Vui lòng nhập mã khoá của bạn để tiếp tục truy cập.</p>
        <form action="{{ route('validate.key') }}" method="POST">
            @csrf
            <div class="input-group">
                <input type="text" name="key" placeholder="Nhập mã khoá..." required autocomplete="off">
                <button type="submit">Xác nhận</button>
            </div>
            <div class="error-message">
                @error('key')
                    <span>{{ $message }}</span>
                @enderror
            </div>
        </form>
    </div>
</body>
</html>
