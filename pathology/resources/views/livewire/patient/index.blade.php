<div style="padding:20px; max-width:900px; margin:auto;">

    <h2>Patient Search</h2>

    {{-- Search Controls --}}
    <div style="display:flex; gap:10px; margin-bottom:15px;">
        
        <input 
            type="text" 
            wire:keyup="searchdata($event.target.value)"
            placeholder="Search patient..."
            style="flex:1; padding:8px;"
        >

        <select wire:model="field" style="padding:8px;">
            <option value="all">All</option>
            <option value="name">Name</option>
            <option value="email">Email</option>
            <option value="phone">Phone</option>
        </select>

    </div>

    {{-- Results --}}
    
    <table border="1" width="100%" cellpadding="8" cellspacing="0">
        <thead style="background:#f5f5f5;">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Age</th>
            </tr>
        </thead>

        <tbody>
            @forelse($patients as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->name }}</td>
                    <td>{{ $p->email }}</td>
                    <td>{{ $p->phone }}</td>
                    <td>{{ $p->gender }}</td>
                    <td>{{ $p->age }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align:center;">No results found</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>
