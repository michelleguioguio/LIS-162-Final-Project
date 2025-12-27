@section('content')
<div style="
    max-width:800px;
    margin:40px auto;
    padding:30px;
    border:2px solid #f6e5ecff;
    border-radius:10px;
    background:#f6e5ecff;
    font-family:Arial, sans-serif;
">

<div style="margin-bottom:20px;">
    <p style="
    text-align:center;
    color:#67775f;
    margin-bottom:10px;
    font-size:32px;
    font-weight:bold;
    font-family: 'Copperplate', 'Copperplate Gothic Light', 'Copperplate Gothic', serif;
    text-transform: uppercase;
    letter-spacing: 1.5px;
">
    {{ $event->event_name }}
</p>
    <p style="text-align:center; color:#67775f; margin-bottom:30px; font-size:15px;">
        {{ $event->event_date ? $event->event_date->format('M d, Y') : 'N/A' }}
    </p>
</div>

 <h3 style="color:#67775f; margin-bottom:15px;">Registered Merchandise</h3>

    @if($event->merchandise->count() > 0)
        <table style="
            width:100%;
            border-collapse:collapse;
            border:2px solid #f6a7c6ff;
            text-align:left;
        ">
            <thead style="background-color:#f8f8f8;">
                <tr>
                    <th style="padding:10px; border-bottom:1px solid #dcfbbdff;">Merchandise</th>
                    <th style="padding:10px; border-bottom:1px solid #dcfbbdff;">Price</th>
                    <th style="padding:10px; border-bottom:1px solid #dcfbbdff;">Stock</th>
                    <th style="padding:10px; border-bottom:1px solid #dcfbbdff;">Type</th>
                </tr>
            </thead>
            <tbody>
@foreach($event->merchandise as $m)
    <tr style="background:#e8f4d7ff;">
        <td style="padding:10px; border-bottom:1px solid #f6a7c6ff;">
            {{ $m->name }}
        </td>

        <td style="padding:10px; border-bottom:1px solid #f6a7c6ff;">
            ₱{{ number_format($m->price, 2) }}
        </td>

        <td style="padding:10px; border-bottom:1px solid #f6a7c6ff;">
            {{ $m->stock }}
            
        </td>

        <td style="padding:10px; border-bottom:1px solid #f6a7c6ff;">
            {{ $m->merchandiseType?->merchandise_type_name ?? 'No type' }}
        </td>
    </tr>
@endforeach

            </tbody>
        </table>
    @else
        <p style="margin-top:10px; font-style:italic; color:#888;">No merchandise registered for this event.</p>
    @endif
</div>

<div style="text-align:center; margin-bottom:30px;">
        <a href="{{ route('events.index')}}" 
           style="
                background:#ea9999; 
                color:white; 
                padding:8px 16px; 
                border-radius:5px; 
                text-decoration:none;
                font-weight:500;
           ">
            Return to Index
        </a>
    </div>
