@section('content')
<div style="
    max-width:600px;
    margin:40px auto;
    padding:30px;
    border:2px solid #f6a7c6ff;
    border-radius:10px;
    background:#fff;
    font-family:Arial, sans-serif;
">
    <h2 style="text-align:center; color:#a4d88cff; margin-bottom:30px;">
        Edit Merchandise
    </h2>

    <form action="{{ route('merchandise.update', ['merchandise'=>$merchandise->id])}}" method="post">
        @csrf
        @method('PUT')

        <!-- Merchandise Name -->
        <div style="margin-bottom:20px;">
            <label for="name" style="display:block; margin-bottom:6px; font-weight:bold;">Merchandise Name</label>
            <input 
                id="name" 
                type="text" 
                name="name" 
                value="{{ old('name', $merchandise->name) }}" 
                required 
                autofocus
                style="
                    width:100%;
                    padding:10px;
                    border:3px solid #9de5ceff;
                    border-radius:5px;
                "
            >
        </div>

        <!-- Price -->
        <div style="margin-bottom:20px;">
            <label for="price" style="display:block; margin-bottom:6px; font-weight:bold;">Price</label>
            <input 
                id="price" 
                type="number" 
                name="price" 
                value="{{ old('price', $merchandise->price) }}" 
                step="0.01" 
                min="0"
                required
                style="
                    width:100%;
                    padding:10px;
                    border:3px solid #9de5ceff;
                    border-radius:5px;
                "
            >
        </div>

        <!-- Stock -->
        <div style="margin-bottom:30px;">
            <label for="stock" style="display:block; margin-bottom:6px; font-weight:bold;">Stock</label>
            <input 
                id="stock" 
                type="number" 
                name="stock" 
                value="{{ old('stock', $merchandise->stock) }}" 
                min="0"
                required
                style="
                    width:100%;
                    padding:10px;
                    border:3px solid #9de5ceff;
                    border-radius:5px;
                "
            >
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
            border:3px solid #9de5ceff;
            border-radius:5px;
            background:#fff;
            font-size:1rem;
        "
    >
        <option value="">Select a type</option>
        @foreach ($merchandise_types as $mt)
            <option value="{{ $mt->id }}" 
                {{ $merchandise->merchandise_type_id == $mt->id ? 'selected' : '' }}>
                {{ $mt->merchandise_type_name }}
            </option>
        @endforeach
    </select>
</div>



        <!-- Form Buttons -->
        <div style="display:flex; justify-content:space-between;">
            <a href="{{ route('dashboard') }}"
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
                        background:#a4d88cff;
                        color:white;
                        padding:10px 20px;
                        border-radius:5px;
                        border:none;
                        cursor:pointer;
                    ">
                Update Merchandise
            </button>
        </div>
    </form>
</div>
