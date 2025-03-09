<x-mainlayout :title="'Editor Panel'" :heading="'Edit Item'">

    {{-- @section('content') --}}
    <h2>Edit Item</h2>
    <form action="{{ route('items.editor.update', $item) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="name" value="{{ $item->name }}" required>
        <input type="number" name="price" value="{{ $item->price }}" required>
        <button type="submit">Update Item</button>
    </form>
{{-- @endsection --}}
    
</x-mainlayout>