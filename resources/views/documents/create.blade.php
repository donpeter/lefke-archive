@extends('layouts.app')
@section('title', trans_choice('navbar.organization',1))

@section('pageTitle', trans_choice('navbar.organization',2))

@section('breadcrumb')
  <li><a href="{{route('home')}}">{{trans_choice('navbar.dashboard',1) }}</a></li>
  <li><a href="{{route('organization.index')}}"><span>{{trans_choice('navbar.file',2)}}</span></a></li>
  <li class="active"><span>{{__('common.manage').' ' .trans_choice('navbar.file',1)}}</span></li>
@endsection
@section('content')
  <!-- Row -->
  <div class="row" id="app">
    <div class="col-md-9">
      <div class="panel panel-default card-view ">
        <div class="panel-heading">
          <div class="pull-left">
            <h6 class="panel-title txt-dark">{{__('common.add').' ' .trans_choice('common.file',1)}}</h6>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="panel-wrapper collapse in">
          <div class="panel-body">
            <div class="col-sm-12 col-xs-12">
              <div class="form-wrap">
                {!! Form::open( ['route' => 'document.store', 'id'=>'addDocument','files' => true])!!}
                
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group{{ $errors->has('ref') ? ' has-error' : '' }}">
                      {!!Form::label('ref', trans_choice('common.ref',1), ['class' => 'control-label mb-10 '])!!}
                      {!!Form::text('ref',null, ['class'=>'form-control', 'placeholder'=> trans_choice('common.ref',1), 'required'=>'required'] )!!}
                      {!! $errors->first('ref', '<span class ="help-block">:message</span> ') !!}
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                      {!!Form::label('title', trans_choice('common.title',1), ['class' => 'control-label mb-10 '])!!}
                      {!!Form::text('title',null, ['class'=>'form-control', 'placeholder'=> trans_choice('common.title',1), 'required'=>'required'] )!!}
                      {!! $errors->first('title', '<span class ="help-block">:message</span> ') !!}
                    </div> 
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group{{ $errors->has('desc') ? ' has-error' : '' }}">
                      {!!Form::label('desc', trans_choice('common.desc',1), ['class' => 'control-label mb-10 '])!!}
                      {!!Form::textarea('desc',null, ['class'=>'form-control', 'placeholder'=> trans_choice('common.desc',1)] )!!}
                      {!! $errors->first('desc', '<span class ="help-block">:message</span> ') !!}
                    </div> 
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group{{ $errors->has('files') ? ' has-error' : '' }}">
                      {!!Form::label('files', trans_choice('common.file',1), ['class' => 'control-label mb-10 '])!!}
                      {!!Form::file('files[]', ['class'=>'form-control', 'multiple','id'=>'files'] )!!}
                      {!! $errors->first('files', '<span class ="help-block">:message</span> ') !!}
                    </div> 
                  </div>
                </div>
                                                                                                                                                   
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="panel panel-default card-view ">
        <div class="panel-heading">
          <div class="pull-left">
            <h6 class="panel-title txt-dark">{{__('common.manage').' ' .trans_choice('common.file',2)}}</h6>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="panel-wrapper collapse in">
          <div class="panel-body">
            <div class="col-sm-12 col-xs-12">
              <button class="btn btn-success btn-block mb-10" type="submit">{{__('upload').' '.trans_choice('common.file',2)}}</button>
              <div class="form-wrap">
                
                <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                  {!!Form::label('type', trans_choice('common.type',1), ['class' => 'control-label mb-10 '])!!}
                  {!!Form::select('type', ['incomming' => 'Incomming', 'outgoing' => 'Outgoing'], 'incomming', ['placeholder' => trans_choice('common.type',1), 'class' => 'form-control'])!!}
                  {!! $errors->first('type', '<span class ="help-block">:message</span> ') !!}
                </div>

                <div class="form-group{{ $errors->has('sender') ? ' has-error' : '' }}">
                  {!!Form::label('sender', trans_choice('common.organization',1), ['class' => 'control-label mb-10 '])!!}
                  <select id='sender' name="sender" class="form-control" data-style="btn-primary btn-outline" tabindex="-98">
                    @foreach($organizations as $organization)
                      <option data-tokens="{{$organization->id }}" value="{{$organization->id }}" {{(old('sender') == $organization->id ) ? 'selected="selected"': '' }} >{{$organization->name }}</option>
                    @endforeach
                  </select>
                  {!! $errors->first('sender', '<span class ="help-block">:message</span> ') !!}
                </div> 

                <div class="form-group{{ $errors->has('receiver') ? ' has-error' : '' }}">
                  {!!Form::label('receiver', trans_choice('common.organization',1), ['class' => 'control-label mb-10 '])!!}
                  <select id='receiver' name="receiver" class="form-control" data-style="btn-primary btn-primary" tabindex="-98">
                    @foreach($organizations as $organization)
                      <option data-tokens="{{$organization->id }}" value="{{$organization->id }}" {{(old('receiver') == $organization->id ) ? 'selected="selected"': '' }} >{{$organization->name }}</option>
                    @endforeach
                  </select>
                  {!! $errors->first('receiver', '<span class ="help-block">:message</span> ') !!}
                </div>  

                <div class="form-group{{ $errors->has('prepaired_on') ? ' has-error' : '' }}">
                  {!!Form::label('prepaired_on', trans_choice('common.prepaired',1), ['class' => 'control-label mb-10 '])!!}
                  {!!Form::text('prepaired_on',null, ['class'=>'form-control datetimepicker', 'placeholder'=> trans_choice('common.prepaired',1)] )!!}
                  {!! $errors->first('prepaired_on', '<span class ="help-block">:message</span> ') !!}
                </div>    

                <div class="form-group{{ $errors->has('signed_on') ? ' has-error' : '' }}">
                  {!!Form::label('signed_on', trans_choice('common.signed',1), ['class' => 'control-label mb-10 '])!!}
                  {!!Form::text('signed_on',null, ['class'=>'form-control date datetimepicker', 'placeholder'=> trans_choice('common.signed',1)] )!!}
                  {!! $errors->first('signed_on', '<span class ="help-block">:message</span> ') !!}
                </div>  

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    {!!Form::close()!!} 
    
    
  </div>
  <!-- /Row -->
  
@endsection


@push('vendorStyles')
    <link href="{{asset('css/datatable.min.css')}}" rel="stylesheet" type="text/css">
    <link href="//cdn.datatables.net/select/1.2.2/css/select.dataTables.min.css" rel="stylesheet" type="text/css">
    <link href="{{asset('css/document.min.css')}}" rel="stylesheet" type="text/css">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">


@endpush
@push('scripts')
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment-with-locales.min.js"></script>
  <script type="text/javascript" src="{{asset('js/document.min.js')}}"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

@endpush