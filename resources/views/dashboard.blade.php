@extends('layouts.app')

@section('css')

@endsection

@section('style')

@endsection

@section('content')

  @if(Session::has('message'))
       <script type="text/javascript">
          toastr.success('{{ Session::get('message') }}', 'Success!!', {timeOut: 5000});
        </script>
  @endif

@endsection

@section('js')

@endsection

@section('script')

@endsection