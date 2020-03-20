@if(Session::has('success'))
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    {!! Session::get('success') !!}
</div>
@endif

@if(Session::has('failed'))
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Warning: </strong> {!! Session::get('failed') !!}
</div>
@endif

@if($errors->all())
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Warning: </strong> @lang('global.alert_warning_error')
</div>
@endif