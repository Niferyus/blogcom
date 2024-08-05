@extends('Admin.admin-panel-layout')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="name" class="form-label">Name</label>
                <textarea class="form-control" disabled name="name" id="name" cols="70" rows="1">{{ $message->name }}</textarea>
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <textarea class="form-control" disabled name="email" id="email" cols="70" rows="1">{{ $message->mail }}</textarea>
            </div>
            <div class="form-group">
                <label for="topic" class="form-label">Topic</label>
                <textarea class="form-control" disabled name="topic" id="topic" cols="70" rows="3">{{ $message->topic }}</textarea>
            </div>
            <div class="form-group">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" disabled name="message" id="message" cols="200" rows="20">{{ $message->message }}</textarea>
            </div>
        </div>
    </div>
</div>
@endsection