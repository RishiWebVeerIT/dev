@extends('layouts.master')
@section('page-title','Home Page')
@section('section')
<div>
    @auth
    <h4>{{ text('Hello '.$name.' welcome to AMC TAX Pay') }} </h4>
  @endauth
<div style="height:500px; justify-content:center; display: flex;
align-items: center;">
    <x-card/>
</div>
</div>
@endsection
