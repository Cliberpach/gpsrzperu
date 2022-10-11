@extends('layout')
@section('content')
    
    <component-map></component-map>
    
@stop
@push('styles-mapas')
    <link href="{{ asset('css/velocimetro.css') }}" rel="stylesheet">
    <link href="{{ asset('Inspinia/css/plugins/iCheck/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/init.css').'?v='.rand() }}">
@endpush
@push('scripts-vuejs')
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key={{gpsKey()}}&libraries=geometry"></script>
<script src="{{ asset("js/maps.js") }}"></script>
@endpush
