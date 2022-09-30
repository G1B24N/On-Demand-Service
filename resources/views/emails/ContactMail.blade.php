@extends('layouts.app')

@section('content')
    <h1>contact message</h1>
    <p>Nama : {{ $details['name'] }}</p>
    <p>Email : {{ $details['email'] }}</p>
    <p>Telepon : {{ $details['phone_number'] }}</p>
    <p>Subjek : {{ $details['msg_subject'] }}</p>
    <p>Pesan: {{ $details['message'] }}</p>
@endsection