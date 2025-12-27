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

    <h2 style="text-align:center; color:#a4d88cff; margin-bottom:30px;">
        Merchandise Details
    </h2>


    <div style="display:grid; grid-template-columns: 1fr 2fr; row-gap:18px; column-gap:20px;">

        <div style="font-weight:bold; color:#6fae8fff;">Merchandise Name</div>
        <div>{{ $merchandise->name }}</div>

        <div style="font-weight:bold; color:#6fae8fff;">Price</div>
        <div>₱{{ number_format($merchandise->price, 2) }}</div>

        <div style="font-weight:bold; color:#6fae8fff;">Stock</div>
        <div>{{ $merchandise->stock }}</div>

        <div style="font-weight:bold; color:#6fae8fff;">Type</div>
        <div>{{ $merchandise->merchandiseType?->merchandise_type_name ?? 'N/A' }}</div>

        <div style="font-weight:bold; color:#6fae8fff;">Artist</div>
        <div>{{ $merchandise->user?->name ?? 'Unknown Artist' }}</div>

        <div style="font-weight:bold; color:#6fae8fff;">Created</div>
        <div>{{ $merchandise->created_at->format('M d, Y h:i A') }}</div>

        <div style="font-weight:bold; color:#6fae8fff;">Last Updated</div>
        <div>{{ $merchandise->updated_at->format('M d, Y h:i A') }}</div>

        <div style="font-weight:bold; color:#6fae8fff;">Merchandise ID</div>
        <div>{{ $merchandise->id }}</div>

    </div>
    <br></br>

    <div style="text-align:center; margin-bottom:20px;">
        
        <a href="{{ route('merchandise.index')}}" 
           style="
                background:#ea9999; 
                color:white; 
                padding:8px 16px; 
                border-radius:5px; 
                text-decoration:none;
            ">
            Return to Index
        </a>
    </div>

</div>
