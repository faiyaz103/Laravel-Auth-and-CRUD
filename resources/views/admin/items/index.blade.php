<x-mainlayout :title="'Admin Panel'" :heading="'Admin Dashboard'">

{{-- @section('content') --}}
    <h2>Items List</h2>
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif
    <a href="{{ route('items.create') }}" class="btn btn-primary">Create Item</a>
    <table>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
        @foreach($items as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->price }}</td>
                <td>
                    <a href="{{ route('items.edit', $item) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('items.destroy', $item) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
{{-- @endsection --}}

</x-mainlayout>