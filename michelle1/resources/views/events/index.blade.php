@section('content')
<div class="container" style="font-family: 'Arial', sans-serif; max-width: 1000px; margin: 0 auto; padding: 20px; text-align:center;">

    <!-- Centered image above the heading -->
    <img src="{{ asset('assets/css/images/eventsicon.png') }}" alt="Events Icon" style="display:block; margin:0 auto 15px auto; width:150px; height:auto;">
    <h1 style="text-align:center; color:#a4d88cff; margin-bottom:20px;">Events List</h1>
        


<div style="
    border:2px solid #fbd9e6ff;
    border-radius:12px;
    overflow:hidden;
">
    <table style="
        width:100%;
        border-collapse:collapse;
        text-align:left;
    ">
        <thead style="background-color:#fbd9e6ff;">
            <tr>
                <th style="padding:10px;">Event ID</th>
                <th style="padding:10px;">Event Name</th>
                <th style="padding:10px;">Date</th>
                <th style="padding:10px; text-align:center;">No. of Merchandise</th>
                <th style="padding:10px; text-align:center;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $e)
                <tr style="border-bottom:1px solid #dcfbbdff; background-color: {{ $loop->even ? '#e8f4d7ff' : '#fff' }};">
                    <td style="padding:10px;">{{ $e->id }}</td>
                    <td style="padding:10px;">{{ $e->event_name }}</td>
                    <td style="padding:10px;">{{ $e->event_date->format('Y-m-d') }}</td>
                   <td style="
                    padding:10px;
                    text-align:center;
                     font-weight:bold;
                     color:#6fae8fff;
                    ">
                     {{ $e->merchandise_count }}
                    </td>


                    <td style="padding:10px; text-align:center;">
                        <a href="{{ route('events.show', $e) }}"
                           style="
                               background:#d0d5cbff;
                               color:white;
                               padding:5px 10px;
                               border-radius:3px;
                               text-decoration:none;
                           ">
                            Show
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


<div style="margin-top:40px; margin-bottom:20px; text-align:center;">

        <a href="{{ route('dashboard') }}" class="button icon solid fa-plus" style="background:#f7c0d7; color:white; padding:8px 16px; border-radius:5px; text-decoration:none; margin-right:20px;">
Back to Dashboard
</a>
<a href="{{ url('http://127.0.0.1:8000/') }}" class="button icon solid fa-plus" style="background:#98b599; color:white; padding:8px 16px; border-radius:5px; text-decoration:none;">
Back to Home
</a>
</div>
</div>