<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link href="backend/css/bootstrap.min.css" rel="stylesheet">
    <link href="backend/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="backend/css/animate.css" rel="stylesheet">
    <link href="backend/css/style.css" rel="stylesheet">
    <link href="backend/css/customize.css" rel="stylesheet">
</head>

<body class="gray-bg">
    <div class="loginColumns animated fadeInDown">
        <div class="row">
            <div class="col-md-6">
                <h2 class="font-bold p-text" style="margin-top:-8px; line-height: 1.5;">Đồng hành cùng bạn trên hành trình kinh doanh.</h2>
                <p class="p-text">
                    1. Tận dụng sự hỗ trợ chuyên sâu: Đội ngũ hỗ trợ của chúng tôi luôn sẵn lòng cung cấp sự trợ giúp và giải đáp mọi thắc mắc để bạn có thể tận hưởng trọn vẹn tiềm năng của ứng dụng.
                </p>
                <p class="p-text">
                    2. Đạt được mục tiêu kinh doanh: Chúng tôi cam kết mang đến cho bạn những công cụ và tài nguyên cần thiết để bạn có thể đạt được mục tiêu kinh doanh và phát triển cửa hàng của mình.
                </p>
                <p class="p-text">
                    3. Tiết kiệm thời gian và công sức: Với giao diện dễ sử dụng và tính năng tự động, chúng tôi giúp bạn tiết kiệm thời gian và công sức trong quá trình quản lý cửa hàng, để bạn có thể tập trung vào những yếu tố quan trọng khác của kinh doanh.
                </p>
                {{-- <p class="txt-center">
                    <small>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</small>
                </p> --}}
            </div>
            <div class="col-md-6">
                <div class="ibox-content">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="m-t" method="post" role="form" action="{{route('auth.login')}}">
                        @csrf
                        <div class="form-group">
                            <input 
                                type="text" 
                                name="email"
                                class="form-control" 
                                placeholder="Email" 
                                value="{{old('email')}}"
                                >

                               @if($errors->has('email'))
                                <span class="error-message">
                                    {{ $errors->first('email') }}
                                </span>
                                @endif

                        </div>
                        <div class="form-group">
                            <input 
                                type="password" 
                                name="password" 
                                class="form-control" 
                                placeholder="Mật khẩu" 
                                >
                                @if($errors->has('password'))
                                <span class="error-message">
                                 * {{ $errors->first('password') }}
                                </span>
                                @endif
                        </div>
                        <button 
                                type="submit" 
                                class="btn btn-primary block full-width m-b">Đăng Nhập
                        </button>

                        <a href="#">
                            <small>Quên mật khẩu</small>
                        </a>

                        <p class="text-muted text-center">
                            <small>Bạn chưa có tài khoản ?</small>
                        </p>
                        <a class="btn btn-sm btn-white btn-block" href="register.html">Tạo mới tài khoản</a>
                    </form>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6">
                Bản quyền thuộc về: HungND
            </div>
            <div class="col-md-6 text-right">
               <small>©2024</small>
            </div>
        </div>
    </div>

</body>

</html>
