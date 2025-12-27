@section('content')
<div style="
    max-width:600px;
    margin:40px auto;
    padding:30px;
    border:2px solid #add79aff;
    border-radius:10px;
    background:#add79aff;
    font-family:Helvetica, sans-serif;
">
<img src="{{ asset('assets/css/images/create.png') }}" alt="Register Icon" style="display:block; margin:0 auto 15px auto; width:200px; height:auto;">
 <h2 style="text-align:center; color:white; margin-bottom:30px;">
        Add New Merchandise
    </h2>

<form action="{{ route('merchandise.store')}}" method="post">

    @csrf
    <div style="margin-bottom:20px;">
            <label for="name" style="display:block; margin-bottom:6px; font-weight:bold;">
                Merchandise Name
            </label>
            <input
                id="name"
                type="text"
                name="name"
                required
                autofocus
                style="
                    width:100%;
                    padding:10px;
                    border:3px solid #8ea385ff;
                    border-radius:5px;
                ">
        </div>

    <br><br>

     <div style="margin-bottom:20px;">
            <label for="price" style="display:block; margin-bottom:6px; font-weight:bold;">
                Price
            </label>
            <input
                id="price"
                type="number"
                name="price"
                step="0.01"
                min="0"
                required
                style="
                    width:100%;
                    padding:10px;
                    border:3px solid #8ea385ff;
                    border-radius:5px;
                ">
        </div>


    <br><br>

     <div style="margin-bottom:30px;">
            <label for="stock" style="display:block; margin-bottom:6px; font-weight:bold;">
                Stock
            </label>
            <input
                id="stock"
                type="number"
                name="stock"
                min="0"
                required
                style="
                    width:100%;
                    padding:10px;
                    border:3px solid#8ea385ff;
                    border-radius:5px;
                ">
        </div>

        <!-- Register for Events -->
<div style="margin-bottom:30px;">
    <label style="display:block; margin-bottom:6px; font-weight:bold;">Register for Events</label>
    @foreach($events as $e)
        <div style="
            display:flex; 
            align-items:center; 
            margin-bottom:6px;
            border:2px solid #fae6f0ff;
            border-radius:5px;
            padding:6px 10px;
            background:#fae6f0ff;
        ">
            <input 
                type="checkbox" 
                name="events[]" 
                value="{{ $e->id }}" 
                id="event_{{ $e->id }}"
                style="margin-right:10px;"
            >
            <label for="event_{{ $e->id }}" style="margin:0;">
                {{ $e->event_name }} ({{ $e->event_date->format('M d, Y') }})
            </label>
        </div>
    @endforeach
</div>

<!-- Merchandise Type -->
<div style="margin-bottom:30px;">
    <label for="merchandise_type_id" style="display:block; margin-bottom:6px; font-weight:bold;">Merchandise Type</label>
    <select 
        id="merchandise_type_id" 
        name="merchandise_type_id" 
        required
        style="
            width:100%;
            padding:10px;
            border:3px solid #8ea385ff;
            border-radius:5px;
            background:#fff;
            font-size:1rem;
        "
    >
        <option value="">Select a type</option>
        @foreach ($merchandise_types as $mt)
            <option value="{{ $mt->id }}">
                {{ $mt->merchandise_type_name }}
            </option>
        @endforeach
    </select>
</div>





    <br><br>
    

    <div style="display:flex; justify-content:space-between;">
            <a href="{{ url('http://127.0.0.1:8000/') }}"
               style="
                   background:#ea9999;
                   color:white;
                   padding:10px 18px;
                   border-radius:5px;
                   text-decoration:none;
               ">
                Cancel
            </a>

            <button type="submit"
                    style="
                        background:#d7f6d1ff;
                        color:black;
                        padding:10px 20px;
                        border-radius:5px;
                        border:none;
                        cursor:pointer;
                    ">
                Save Merchandise
            </button>
        </div>
</form>