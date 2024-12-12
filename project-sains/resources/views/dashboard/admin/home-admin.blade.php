@extends('dashboard.admin.base-admin')

@section('title', 'SAINS - Dashboard')

@section('content')

<div class="p-6  bg-white rounded shadow">
    {!! $PieChart->container() !!}
</div>

<script src="{{ $PieChart->cdn() }}"></script>
{{ $PieChart->script() }}

<hr>
<br>

<div class="p-6  bg-white rounded shadow">
    {!! $BarChart->container() !!}
</div>

<script src="{{ $BarChart->cdn() }}"></script>
{{ $BarChart->script() }}
<hr>
<br>

<div class="p-6  bg-white rounded shadow">
    {!! $LineChart->container() !!}
</div>

<script src="{{ $LineChart->cdn() }}"></script>
{{ $LineChart->script() }}









@endsection