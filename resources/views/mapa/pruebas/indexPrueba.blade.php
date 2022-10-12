@extends('layout')
@section('content')
    <p>holas{{ env('DB_DATABASE',787) }}</p>
    <component-map></component-map>
    
@stop
@push('styles-mapas')
    <link href="/css/velocimetro.css" rel="stylesheet">
    <link href="/Inspinia/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ '/css/init.css?v='.rand() }}">
    
@endpush
@push('scripts-vuejs')
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key={{gpsKey()}}&libraries=geometry"></script>
<script src="/js/maps.js"></script>
@endpush
