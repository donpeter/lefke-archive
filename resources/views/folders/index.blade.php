@extends('layouts.app')

@section('title', trans_choice('common.folder',1))

@section('content')
  <div class="row">
    <div class="col-sm-12">
      @include('folders._list',['editable' => false])  
    </div>  
  </div>  
  
@endsection

@push('vendorStyles')
    <link href="{{asset('css/datatable.min.css')}}" rel="stylesheet" type="text/css">
@endpush

@push('scripts')
    <script src="{{asset('js/folder.min.js')}}"></script>
@endpush
