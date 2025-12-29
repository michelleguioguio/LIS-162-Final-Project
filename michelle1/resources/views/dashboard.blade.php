<x-app-layout>
    <x-slot name="header">
        <h2
            class="text-2xl font-bold tracking-wide"
            style="color:#a4d88cff;"
        >
            Welcome back, {{ auth()->user()->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            
            
            <div
                class="overflow-hidden sm:rounded-2xl shadow-md"
                style="background-color:#fdf6fb; border:3px solid #92a28fff;"
            >

            <br></br>
            <div class="p-8 text-center";>

                <h3
                        class="text-xl font-semibold mb-4"
                        style="color:#a4d88cff;"
                >
                    Do your stuff!
                </h3>

                    

            <div class="flex flex-wrap justify-center" style="column-gap: 10rem; row-gap: 3rem;">
            
                <a href="{{ route('merchandise.create') }}" class="flex flex-col items-center gap-2">
                    <img
                    src="{{ asset('assets/css/images/create2.png') }}"
                    alt="Register Merchandise"
                    style="height:auto; width:150px;"
                    >
                    <span class="font-bold text-#a4d88cff text-center">Register Merchandise</span>
                </a>

                
                <a href="{{ url('http://127.0.0.1:8000/merchandise') }}" class="flex flex-col items-center gap-2">
                    <img
                    src="{{ asset('assets/css/images/merchicon.png') }}"
                    alt="View Merchandise"
                    style="height:auto; width:150px;"
                    >
                    <span class="font-bold text-[#a4d88cff] text-center">View Merchandise</span>
                </a>

                
                <a href="{{ url('http://127.0.0.1:8000/events') }}" class="flex flex-col items-center gap-2">
                    <img
                    src="{{ asset('assets/css/images/eventsicon.png') }}"
                    alt="View Events"
                    style="height:auto; width:150px;"
                    >
                    <span class="font-bold text-#a4d88cff text-center">View Events</span>
                </a>
            </div>
            <br></br>
                <h3
                    class="text-xl font-semibold mb-4"
                    style="color:#a4d88cff;"
                    >
                    Your merchandise
                </h3>
            <a>
            
            <div class="mt-10 overflow-hidden rounded-xl border"
                 style="border-color:#f6a7c6ff; background-color:#fff;">
                 
                @if($merchandise->count())
                    <table class="w-full text-left border-collapse">
                        <thead style="background-color:#f6dee8ff;">
                            <tr>
                                <th class="px-4 py-3">Name</th>
                                <th class="px-4 py-3">Price</th>
                                <th class="px-4 py-3">Stock</th>
                                <th class="px-4 py-3">Type</th>
                                <th class="px-4 py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($merchandise as $m)
                                <tr style="background-color: {{ $loop->even ? '#e8f4d7ff' : '#fff' }};">
                                    <td class="px-4 py-3">{{ $m->name }}</td>
                                    <td class="px-4 py-3">₱{{ number_format($m->price, 2) }}</td>
                                    <td class="px-4 py-3">{{ $m->stock }}</td>
                                    <td class="px-4 py-3">{{ $m->merchandiseType?->merchandise_type_name ?? 'No type' }}</td>
                                    <td class="px-4 py-3 flex gap-2">
                                        <a href="{{ route('merchandise.show', $m->id) }}"
                                           class="px-2 py-1 text-white rounded"
                                           style="background-color:#a4d88cff;">Show</a>
                                        <a href="{{ route('merchandise.edit', $m->id) }}"
                                           class="px-2 py-1 text-white rounded"
                                           style="background-color:#f6a7c6ff;">Edit</a>
                                        <form action="{{ route('merchandise.destroy', $m->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="px-2 py-1 text-white rounded"
                                                    style="background-color:#ea9999;">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="p-6 text-center text-gray-500">
                        You haven’t registered any merchandise yet
                    </p>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
