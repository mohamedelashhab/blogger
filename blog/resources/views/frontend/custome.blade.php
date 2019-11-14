@extends('layouts.app')

@section('content')

    {!! html_entity_decode($body)  !!}

@endsection

