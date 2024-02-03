<div class="filter-wrapper">
    <div class="uk-flex uk-flex-middle uk-flex-space-between">
        <div class="perpage">
            <div class="uk-flex uk-flex-middle uk-flex-space-between">
                <select name="perpage" class="form-control imput-sm perpage filter mr10">
                    @for($i = 20; $i <= 200; $i+=20){
                        <option value="{{ $i }}">{{ $i }} bản ghi</option>
                    }@endfor
                </select>
            </div>
        </div>
        <div class="action">
            <div class="uk-flex uk-flex-middle">
                <select name="user_catalogue_id" class="form-control mr10 selected-role">
                    <option value="0" selected= "selected">Chọn nhóm thành viên</option>
                    <option value="1">Quản trị viên</option>
                </select>
                <div class="uk-search uk-flex uk-flex-middle mr10">
                    <input 
                    type="text"
                    name="keywords"
                    value=""
                    placeholder="Nhập Từ khóa bạn muốn tìm kiếm ..."
                    class="form-control mr10">
                    <span class="input-group-btn mr75">
                        <button type="submit" name="search" value="search" class="btn btn-primary mr10 mt2 mb0 btn-sm text-search">
                            Tìm Kiếm
                        </button>
                    </span>
                </div>
                <a href="{{route('user.create')}}" class="btn btn-danger mt2">
                    <i class="fa fa-plus"></i> Thêm mới thành viên
                </a>
            </div>
        </div>
    </div>
</div>