<x-mainlayout :title="'Editor Panel'" :heading="'Editor Dashboard'">

{{-- @section('content') --}}
    <h2>Items List</h2>
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif
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
                    <a href="{{ route('items.editor.edit', $item) }}" class="btn btn-warning">Edit</a>
                </td>
            </tr>
        @endforeach
    </table>
{{-- @endsection --}}

</x-mainlayout>