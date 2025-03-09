<x-mainlayout :title="'Items'" :heading="'View Items'">

    @auth
        <h1>List of available Items</h1>
    @else 
        <h1>Login to view items</h1>
    @endauth

</x-mainlayout>