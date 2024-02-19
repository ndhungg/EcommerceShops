@include('backend.dashboard.component.breadcrumb',['title' => $config['seo']['create']['title']])
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@php
    $url = ($config['method'] == 'create') ?  route('user.store') : route('user.update', $user->id);
@endphp
<form method="post" action="{{ $url }}" class="box">
    @csrf
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
                                    <label class="control-lable text-left">Email
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input 
                                        type="text"
                                        name="email"
                                        value="{{ old('email', ($user->email) ?? '') }}"
                                        class="form-control"
                                        placeholder=""
                                        autocomplete="off"
                                    >
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label class="control-lable text-left">Họ Tên
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input 
                                        type="text"
                                        name="name"
                                        value="{{ old('name' , ($user->name) ?? '') }}"
                                        class="form-control"
                                        placeholder=""
                                        autocomplete="off"
                                    >
                                </div>
                            </div>
                        </div>
                        @php
                            $userCatalogue = [
                                '[Chọn nhóm thành viên ]',
                                'Quản trị viên',
                                'Cộng tác viên'
                            ]
                        @endphp
                        <div class="row mt15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label class="control-lable text-left">Nhóm Thành Viên
                                        <span class="text-danger">(*)</span>
                                        <select name="user_catalog_id" class="form-control mt5 setupSelect2">
                                            @foreach($userCatalogue as $key => $item)
                                                <option  {{ $key == old('user_catalog_id', 
                                                (isset($user->user_catalog_id)) ? $user->user_catalog_id: '') ? 'selected':'' }} 
                                                value="{{$key}}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label class="control-lable text-left">Ngày sinh
                                    </label>
                                    <input 
                                        type="date"
                                        name="birthday"
                                        value="{{ old('birthday', 
                                                    (isset($user->birthday)) ? date('Y-m-d', strtotime($user->birthday)) : '') }}"
                                        class="form-control"
                                        placeholder=""
                                        autocomplete="off"
                                    >
                                </div>
                            </div>
                        </div>
                        @if($config['method'] == 'create')
                        <div class="row mt15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label class="control-lable text-left">Mật khẩu
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
                                    <label class="control-lable text-left">Nhập lại mật khẩu
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
                        @endif
                        <div class="row mt15">
                            <div class="col-lg-12">
                                <div class="form-row">
                                    <label class="control-lable text-left">Ảnh đại diện
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input 
                                        type="text"
                                        name="image"
                                        value="{{ old('image') }}"
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
                                    <label class="control-lable text-left">Thành Phố
                                    </label>
                                    <select name="province_id" class="form-control mt5 setupSelect2 province location" data-target="districts">
                                        <option value="0">[Chọn Thành Phố]</option>
                                        @if(isset($provinces))
                                            @foreach($provinces as $item)
                                                <option 
                                                    @if(old('province_id') == $item->code) selected
                                                    @endif  value="{{ $item->code }}">{{ $item->name }}
                                            </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label class="control-lable text-left">Quận/Huyện
                                    </label>
                                    <select name="district_id" class="form-control mt5 setupSelect2 districts location" data-target="wards">
                                        <option value="0">[Chọn Quận/Huyện]</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mt15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label class="control-lable text-left">Phường/Xã
                                        <select name="ward_id" class="form-control mt5 setupSelect2 wards">
                                            <option value="0">[Chọn Phường/Xã]</option>
                                        </select>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label class="control-lable text-left">Địa chỉ
                                    </label>
                                    <input 
                                        type="text"
                                        name="address"
                                        value="{{ old('address', ($user->address) ?? '') }}"
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
                                    <label class="control-lable text-left">Điện thoại
                                    </label>
                                    <input 
                                        type="text"
                                        name="phone"
                                        value="{{ old('phone' ,($user->phone) ?? '') }}"
                                        class="form-control"
                                        placeholder=""
                                        autocomplete="off"
                                    >
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label class="control-lable text-left">Ghi chú
                                    </label>
                                    <input 
                                        type="text"
                                        name="description"
                                        value="{{ old('description',($user->description) ?? '') }}"
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
                <button type="submit" class="btn btn-sm btn-primary mb10">Lưu Lại</button> 
            </span>
        </div>
    </div>
</form>

<script>
    var province_id = '{{ (isset($user->province_id)) ? $user->province_id : old('province_id') }}';
    var district_id = '{{ (isset($user->district_id)) ? $user->district_id : old('district_id') }}';
    var ward_id = '{{ (isset($user->ward_id)) ? $user->ward_id : old('ward_id') }}';
</script>
