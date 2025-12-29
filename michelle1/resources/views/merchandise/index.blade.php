@section('content')
<div class="container" style="font-family: 'Helvetica', sans-serif; max-width: 1000px; margin: 0 auto; padding: 20px; text-align:center;">

    <img src="{{ asset('assets/css/images/merchicon.png') }}" alt="Merchandise Icon" style="display:block; margin:0 auto 15px auto; width:150px; height:auto;">
    <h1 style="text-align:center; color:#a4d88cff; margin-bottom:20px;">Merchandise List</h1>
  


<div style="
        border:2px solid #f6a7c6ff;
        border-radius:12px;
        overflow:hidden;
    ">
        <table style="
            width:100%;
            border-collapse:collapse;
            text-align:left;
        ">
            <thead style="background-color:#f6dee8ff;">
                <tr>
                    <th style="padding:10px;">Merchandise Name</th>
                    <th style="padding:10px;">Price</th>
                    <th style="padding:10px;">Stock</th>
                    <th style="padding:10px;">Type</th>
                    <th style="padding:10px;">Artist</th>
                    <th style="padding:10px;">Actions</th>
                </tr>
            </thead>

        <tbody>
          @foreach($merchandise as $m)
            <tr style="border-bottom:1px solid #dcfbbdff; background-color: {{ $loop->even ? '#e8f4d7ff' : '#fff' }};">
              <td class="px-4 py-2">{{ $m->name }}</td>
              <td class="px-4 py-2">{{ $m->price }}</td>
              <td class="px-4 py-2">{{ $m->stock }}</td>
              <td class="px-4 py-2">{{ $m->merchandiseType?->merchandise_type_name ?? 'No type' }}</td>
              <td class="px-4 py-2">{{ $m->user?->name ?? 'Unknown Artist' }}</td>


                <td>
                      <a href="{{ route('merchandise.show', ['merchandise' => $m->id]) }}"
                        class="button small"
                        style="
                              background:#d0d5cbff;
                              color:white;
                              padding:6px 12px;
                              border-radius:6px;
                              text-decoration:none;
                              display:inline-block;
                              margin:6px 0;
                        ">
                          Show
                      </a>
                    
                </td>

            
            </tr>
          @endforeach
        </tbody>
      </table>
</div>

    <div style=" margin-top:40px; margin-bottom:20px; text-align:center;">
            <a href="{{ route('dashboard') }}" class="button icon solid fa-plus" style="background:#f7c0d7; color:white; padding:8px 16px; border-radius:5px; text-decoration:none; margin-right:20px;">
            Back to Dashboard
            </a>
            <a href="{{ url('http://127.0.0.1:8000/') }}" class="button icon solid fa-plus" style="background:#98b599; color:white; padding:8px 16px; border-radius:5px; text-decoration:none; margin-right:20px;">
          Back to Home
          </a>
            
    </div>
</div>