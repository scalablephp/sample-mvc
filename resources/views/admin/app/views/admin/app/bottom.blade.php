<script type="text/javascript">
    var _token = $('meta[name="_token"]').attr('content');
    var sonnysailer_app;
    function showConfirmModal(url) {
        $('#confirmmodel').modal('show');
        $("#delete_link").attr("action", url);
    }
    $(document).on('submit', '#delete_link', function(event) {
        var u = $(this).attr("action");
        var l = Ladda.create($(this).find('button').get(0));
        l.start();
        $.ajax({
            url: u,
            type:'POST',
            data:$(this).serialize(),
            datatype : "application/json",
            success:function(data){
                l.stop();
                $('#confirmmodel').modal('hide');
                if(data.sucess == "true"){
                    sonnysailer_app.notifyWithtEle(data.message,'success');
                }else{
                    sonnysailer_app.notifyWithtEle(data.message,'error');
                }
                if(data.method != ""){
                    eval(data.method);
                }
            }
        });
        event.preventDefault();
    });
</script>
<div class="modal fade" id="confirmmodel" aria-hidden="true" aria-labelledby="confirl_model" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete</h5>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button>
            </div>
            <div class="modal-body">
                <h5> Are You Sure?</h5>
            </div>
            <div class="modal-footer">
                {!! Form::open(array('method' => 'delete','id' => 'delete_link')) !!}
                    <button class="btn btn-danger" data-style="zoom-in"> Delete</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"> Close</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

<!-- validation -->
<script type="text/javascript" src="{{ URL::asset('assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/plugins/jquery-validation/additional-methods.min.js') }}"></script>
<!-- ladda -->
<script type="text/javascript" src="{{ URL::asset('assets/plugins/ladda/spin.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/plugins/ladda/ladda.min.js') }}"></script>
<!-- notification -->
<script type="text/javascript" src="{{ URL::asset('assets/plugins/noty/noty.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/plugins/popper.js/dist/umd/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/plugins/moment/moment.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/plugins/select2/dist/js/select2.full.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/plugins/jquery-bar-rating/dist/jquery.barrating.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/plugins/ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/plugins/tether/dist/js/tether.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/plugins/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/backend/js/dataTables.bootstrap4.min.js') }}"></script>
<!-- bootstrap -->
<script type="text/javascript" src="{{ URL::asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/plugins/bootstrap/js/dist/util.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/plugins/bootstrap/js/dist/alert.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/plugins/bootstrap/js/dist/button.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/plugins/bootstrap/js/dist/carousel.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/plugins/bootstrap/js/dist/collapse.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/plugins/bootstrap/js/dist/dropdown.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/plugins/bootstrap/js/dist/modal.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/plugins/bootstrap/js/dist/tab.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/plugins/bootstrap/js/dist/tooltip.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/plugins/bootstrap/js/dist/popover.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/backend/js/maince5a.js') }}"></script>
<!-- common functions -->
<script type="text/javascript" src="{{ URL::asset('assets/backend/js/common.min.js') }}"></script>