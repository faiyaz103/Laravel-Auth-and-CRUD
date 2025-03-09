<x-mainlayout :title="'Admin Panel'" :heading="'Create Item'">

    {{-- @section('content') --}}
    <h2>Create Item</h2>
    <form action="{{ route('items.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Item Name" required>
        <input type="number" name="price" placeholder="Price" required>
        <button type="submit">Add Item</button>
    </form>
{{-- @endsection --}}
    
</x-mainlayout>