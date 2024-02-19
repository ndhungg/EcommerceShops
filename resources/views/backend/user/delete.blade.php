@include('backend.dashboard.component.breadcrumb',['title' => $config['seo']['delete']['title']])
<form method="post" action="{{ route ('user.destroy', $user->id)}}" class="box">
    @csrf
    @method('DELETE')
    <div class="wrapper wapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-title">
                    Thông tin chung
                </div>
                <div class="panel-description">
                    <p> Bạn đang muốn xóa thông tin thành viên có Email là: <span class="text-danger">{{$user->email}}</span> </p>
                    <p> <span class="text-danger panel-sub-title">Lưu ý </span>: Không thể khôi phục thành viên sau khi xóa. Hãy chắc chắn bạn muốn thực hiện chức năng này.</p>
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
                                        readonly
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
                                        readonly
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="hr-margin">
        <div class="text-right">
            <span class="input-group-btn">
                <button type="submit" class="btn btn-sm btn-danger mb10">Xóa dữ liệu</button> 
            </span>
        </div>
    </div>
</form>