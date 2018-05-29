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

<script type="text/javascript" src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/all-main.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/slider.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/owl.carousel.min.js') }}"></script>
<!-- validation -->
<script type="text/javascript" src="{{ URL::asset('assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/plugins/jquery-validation/additional-methods.min.js') }}"></script>
<!-- ladda -->
<script type="text/javascript" src="{{ URL::asset('assets/plugins/ladda/spin.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/plugins/ladda/ladda.min.js') }}"></script>
<!-- notification -->
<script type="text/javascript" src="{{ URL::asset('assets/plugins/noty/noty.min.js') }}"></script>
<!-- common functions -->
<script type="text/javascript" src="{{ URL::asset('assets/js/common.min.js') }}"></script>