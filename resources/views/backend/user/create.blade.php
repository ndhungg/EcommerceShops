@include('backend.dashboard.component.breadcrumb',['title' => $config['seo']['create']['title']])

<form method="post" action="" class="box">
    <div class="wrapper wapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-title">
                    Thông tin chung
                </div>
                <div class="panel-description">
                    <p> Nhập thông tin người sử dụng</p>
                    <p> Lưu ý: Những trường có <span class="text-danger">(*)</span> là bắt buộc</p>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-lable text-left">Email
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input 
                                        type="text"
                                        name="email"
                                        value=""
                                        class="form-control"
                                        placeholder=""
                                        autocomplete="off"
                                    >
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-lable text-left">Họ Tên
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input 
                                        type="text"
                                        name="name"
                                        value=""
                                        class="form-control"
                                        placeholder=""
                                        autocomplete="off"
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="row mt15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-lable text-left">Nhóm Thành Viên
                                        <span class="text-danger">(*)</span>
                                        <select name="user_catalogue_id" class="form-control mt5">
                                            <option value="0">[Chọn nhóm thành viên]</option>
                                            <option value="1">Quản trị viên</option>
                                            <option value="2">Cộng tác viên</option>
                                        </select>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-lable text-left">Ngày sinh
                                    </label>
                                    <input 
                                        type="date"
                                        name="birthdate"
                                        value=""
                                        class="form-control"
                                        placeholder=""
                                        autocomplete="off"
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="row mt15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-lable text-left">Mật khẩu
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input 
                                        type="password"
                                        name="password"
                                        value=""
                                        class="form-control"
                                        placeholder=""
                                        autocomplete="off"
                                    >
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-lable text-left">Nhập lại mật khẩu
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input 
                                        type="password"
                                        name="re_password"
                                        value=""
                                        class="form-control"
                                        placeholder=""
                                        autocomplete="off"
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="row mt15">
                            <div class="col-lg-12">
                                <div class="form-row">
                                    <label for="" class="control-lable text-left">Ảnh đại diện
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input 
                                        type="text"
                                        name="image"
                                        value=""
                                        class="form-control"
                                        placeholder=""
                                        autocomplete="off"
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="hr-margin">
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-title">
                    Thông tin liên hệ
                </div>
                <div class="panel-description">
                   <p> Nhập thông tin người sử dụng</p>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-lable text-left">Thành Phố
                                    </label>
                                    <select name="province_id" class="form-control mt5 setupSelect2 province">
                                        <option value="0">[Chọn Thành Phố]</option>
                                        @if(isset($provinces))
                                            @foreach($provinces as $item)
                                                <option value="{{ $item->code }}">{{ $item->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-lable text-left">Quận/Huyện
                                    </label>
                                    <select name="district_id" class="form-control mt5 province">
                                        <option value="0">[Chọn Quận/Huyện]</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mt15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-lable text-left">Phường/Xã
                                        <select name="ward_id" class="form-control mt5">
                                            <option value="0">[Chọn Phường/Xã]</option>
                                        </select>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-lable text-left">Điện thoại
                                    </label>
                                    <input 
                                        type="text"
                                        name="phone"
                                        value=""
                                        class="form-control"
                                        placeholder=""
                                        autocomplete="off"
                                    >
                                </div>
                            </div>
                            <div class="col-lg-12 mt15">
                                <div class="form-row">
                                    <label for="" class="control-lable text-left">Ghi chú
                                    </label>
                                    <input 
                                        type="text"
                                        name="note"
                                        value=""
                                        class="form-control"
                                        placeholder=""
                                        autocomplete="off"
                                    >
                                </div>
                            </div>
                            <div class="col-lg-12 mt15">
                                <div class="form-row">
                                    <label for="" class="control-lable text-left">Địa chỉ
                                    </label>
                                    <input 
                                        type="text"
                                        name="address"
                                        value=""
                                        class="form-control"
                                        placeholder=""
                                        autocomplete="off"
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-right">
            <span class="input-group-btn">
                <button type="button" class="btn btn-sm btn-primary">Lưu Lại</button> 
            </span>
        </div>
    </div>
</form>