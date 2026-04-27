@extends('layouts.app')

@section('content')
    
     @livewire('doctor.createdoctor', ['id' => $id])
@endsection