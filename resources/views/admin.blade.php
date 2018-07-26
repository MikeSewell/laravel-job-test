@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <div>
                @if($leads)
                <ul class="list-group">
                @foreach ($leads as $lead)
                <li class="list-group-item d-flex justify-content-between align-items-center">Name: {{ $lead->name }} Email: {{$lead->email}} Phone Number: {{$lead->phone}} Postal Code: {{$lead->postalCode}} <span><a href="rmLead/{{$lead->id}}">delete</a></span></li>
                @endforeach
                </ul>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
