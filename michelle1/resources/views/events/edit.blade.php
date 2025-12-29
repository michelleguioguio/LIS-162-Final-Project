@extends('layouts.app')

@section('content')
<div style="
    max-width:800px;
    margin:40px auto;
    padding:30px;
    border:2px solid #f6a7c6ff;
    border-radius:10px;
    background:#fff;
    font-family:Arial, sans-serif;
">

    <h2 style="text-align:center; color:#a4d88cff; margin-bottom:30px;">Edit Event</h2>

    <form action="{{ route('events.update', $event) }}" method="POST">
        @csrf
        @method('PUT')

        
        <div style="margin-bottom:20px;">
            <label for="event_name" style="display:block; font-weight:bold; margin-bottom:5px;">Event Name</label>
            <input type="text" name="event_name" id="event_name" 
                value="{{ old('event_name', $event->event_name) }}" 
                style="width:100%; padding:10px; border:1px solid #f6a7c6ff; border-radius:5px;">
        </div>

        
        <div style="margin-bottom:20px;">
            <label for="event_date" style="display:block; font-weight:bold; margin-bottom:5px;">Date</label>
            <input type="date" name="event_date" id="event_date" 
                value="{{ old('event_date', $event->event_date->format('Y-m-d')) }}" 
                style="width:100%; padding:10px; border:1px solid #f6a7c6ff; border-radius:5px;">
        </div>

        
        <h4 style="color:#a4d88cff; margin-bottom:10px;">Assign Merchandise</h4>
        <div style="margin-bottom:20px;">
            @foreach($merchandise as $m)
                <div style="margin-bottom:8px;">
                    <label style="display:flex; align-items:center; gap:8px;">
                        <input type="checkbox" name="merchandise[]" value="{{ $m->id }}"
                            {{ $event->merchandise->contains($m->id) ? 'checked' : '' }}
                            style="width:16px; height:16px;">
                        <span>{{ $m->name }}</span>
                    </label>
                </div>
            @endforeach
        </div>

        
        <div style="text-align:center;">
            <button type="submit" style="
                background:#a4d88cff; 
                color:white; 
                padding:10px 20px; 
                border:none; 
                border-radius:5px;
                cursor:pointer;
            ">Update Event</button>
        </div>

    </form>
</div>
@endsection

