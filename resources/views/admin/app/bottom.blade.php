<script type="text/javascript">
    var _token = $('meta[name="_token"]').attr('content');
    var altair_md,app_datatables,altair_forms;
    function showAjaxModal(url,title,th="")
    {
        if(th != ""){
            url = url+"/"+$(th).attr('data-id');
        }
        var modal = UIkit.modal("#medium_modal");
        if (modal.isActive()) {
            modal.hide();
        } else {
            modal.show();
            $.ajax({
                url: url,
                success: function(response)
                {
                    jQuery('#medium_modal .uk-modal-title').html("");
                    jQuery('#medium_modal .uk-modal-title').html(title);
                    jQuery('#medium_modal .uk-modal-body').html("");
                    jQuery('#medium_modal .uk-modal-body').html(response);
                    altair_md.init();
                    app_datatables.valid_attr();
                }
            });
        }
    }
    function showConfirmModal(url)
    {
        var modal = UIkit.modal("#confirm_modal");
        if (modal.isActive()) {
            modal.hide();
        } else {
            modal.show();
            jQuery("#delete_link").attr("action", url);
        }
    }
    $(document).on('submit', '#delete_link', function(event) {
        var u = $(this).attr("action");
        var l = Ladda.create($(this).find('button').get(0));
        l.start();
        var modal = UIkit.modal("#confirm_modal");
        $.ajax({
            url: u,
            type:'POST',
            data:$(this).serialize(),
            datatype : "application/json",
            success:function(data){
                l.stop();
                modal.hide();
                if(data.sucess == "true"){
                    notifyWithtEle(data.message,'success');
                }else{
                    notifyWithtEle(data.message,'danger');
                }
                if(data.method != ""){
                    eval(data.method);
                }
            }
        });
        event.preventDefault();
    });
</script>
<div class="uk-modal" id="medium_modal">
    <div class="uk-modal-dialog">
        <button type="button" class="uk-modal-close uk-close"></button>
        <div class="uk-modal-header">
            <h3 class="uk-modal-title"></h3>
        </div>
        <div class="uk-modal-body">
        </div>
    </div>
</div>
<div class="uk-modal" id="confirm_modal">
    <div class="uk-modal-dialog" style="width: 25%;">
        <button type="button" class="uk-modal-close uk-close"></button>
        <div class="uk-margin uk-modal-content">{{ __('are_you_sure') }}</div>
        <div class="uk-modal-footer uk-text-right">
            {!! Form::open(array('method' => 'delete','id' => 'delete_link')) !!}
              <button class="md-btn md-btn-danger md-btn-wave-light waves-effect waves-button waves-light delete" data-style="zoom-in">{{ __('ok') }}</button>
              <button class="md-btn md-btn-flat uk-modal-close">{{ __('cancel') }}</button>
            {!! Form::close() !!}
        </div>
    </div>
</div>
<!-- google web fonts -->
<script type="text/javascript">
    WebFontConfig = {
        google: {
            families: [
                'Source+Code+Pro:400,700:latin',
                'Roboto:400,300,500,700,400italic:latin'
            ]
        }
    };
    (function() {
        var wf = document.createElement('script');
        wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
        '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
        wf.type = 'text/javascript';
        wf.async = 'true';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(wf, s);
    })();
</script>
<!-- common functions -->
<script type="text/javascript" src="{{ URL::asset('assets/js/common.min.js') }}"></script>
<!-- uikit functions -->
<script type="text/javascript" src="{{ URL::asset('assets/js/uikit_custom.min.js') }}"></script>
<!-- altair common functions/helpers -->
<script type="text/javascript" src="{{ URL::asset('assets/js/altair_admin_common.min.js') }}"></script>

<!-- page specific plugins -->
<script type="text/javascript" src="{{ URL::asset('assets/js/ladda/spin.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/ladda/ladda.min.js') }}"></script>
<!-- validation -->
<script type="text/javascript" src="{{ URL::asset('assets/js/jquery-validation/jquery.validate.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/jquery-validation/additional-methods.min.js') }}"></script>
<!-- datatables -->
<script type="text/javascript" src="{{ URL::asset('bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('bower_components/datatables/media/js/dataTables.buttons.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('bower_components/datatables/media/js/input.js') }}"></script>
<!-- datatables custom integration -->
<script type="text/javascript" src="{{ URL::asset('assets/js/custom/datatables/datatables.uikit.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/pages/plugins_datatables.min.js') }}"></script>
<!--  notifications functions -->
<script type="text/javascript" src="{{ URL::asset('assets/js/pages/components_notifications.js') }}"></script>
<script type="text/javascript">
    $(function() {
        if(isHighDensity()) {
            $.getScript("bower_components/dense/src/dense.js", function() {
                // enable hires images
                altair_helpers.retina_images();
            });
        }
        if(Modernizr.touch) {
            // fastClick (touch devices)
            FastClick.attach(document.body);
        }
    });
    $window.load(function() {
        // ie fixes
        altair_helpers.ie_fix();
    });
</script>