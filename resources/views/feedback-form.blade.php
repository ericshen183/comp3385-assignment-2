@extends('layouts.app')

@section('content')
    <h1 class="feedback">Feedback Form</h1>
    <form action="/feedback/send" method="POST">
        @csrf
        <div class="form-group">
            <label>Full Name<div id='req'>(Required)</div></label>
            <input name='name' id='name' type="text" required>
            <label>Email<div id='req'>(Required)</div></label>
            <input name='email' id="email" type="email" required>
            <label>Comments<div id='req'>(Required)</div></label>
            <textarea name="comments" id="comments" required></textarea>
            <p>Let us know what you think of our website</p>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>
@endsection