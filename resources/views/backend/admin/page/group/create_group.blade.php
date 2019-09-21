<div class="modal fade in" id="modal-add_group" style="display: none; padding-right: 17px;" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Thêm nhóm</h4>
            </div>
            <form action="post" name="frmCreateGroup" id="frmCreateGroup">
                {{ csrf_field() }}

                <div class="modal-body">
                    <div class="row">

                        <div class="col-md-6">
                            <div id="div_txtfullname" class="form-group has-success">
                              <label for="txtfullname">Họ tên</label>
                              <input type="text" class="form-control" id="txtfullname" placeholder="Nhập họ và tên" name='txtfullname' maxlength="60">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div id="div_txtsex" class="form-group has-success">
                                <label>Đại lý</label>
                                <select class="form-control" id="txtbranch" name="txtbranch">
                                     @foreach($branch as $branch)
                                      <option value="{{$branch->br_id}}">{{$branch->br_name}}</option>
                                     @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
            </form>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"> &nbsp; </i>Close</button>
                <button type="button" class="btn btn-primary" id="btn_create_group"><i class="fa fa-save"> &nbsp; </i>Save</button>
            </div>
        </div>
            <!-- /.modal-content -->
    </div>
        <!-- /.modal-dialog -->
</div>