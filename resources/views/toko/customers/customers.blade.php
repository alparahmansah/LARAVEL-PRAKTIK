 @extends ('template/admin/index')
 

 @section ('content')
     <h1>Customers</h1>
     <a href="{{ route('customers.create') }}" class= "btn btn-success mb-3">Add Customers</a>
    
     <table class = 'table'>
        <thead>
        <tr>
            <th scope='col'>No</th>
            <th scope='col'>Nama</th>
            <th scope='col'>Alamat</th>
            <th scope='col'>No HP</th>
            <th scope='col'>Action</th>
        </tr>
        </thead>
        <tbody>
            @php $number = 1; @endphp
            @foreach ($customer as $customers)
            <tr>
                <td>{{ $number++ }}</td>
                <td>{{ $customers->name }}</td>
                <td>{{ $customers->address }}</td>
                <td>{{ $customers->no_hp }}</td>
                <td><a href="{{ route('customers.edit', $customers) }}"  class="btn btn-warning">Edit</a>
                    <form action="{{ route('customers.destroy', $customers) }}" method="POST" style="display: inline ">
                    @csrf
                    @method('DELETE')
                    <button type="submit"  onclick = "return confirm('Apakah Anda yakin ingin menghapus data ini?')" class="btn btn-danger">Delete</button>
                </form></td>
            </tr>

            @php $number++ @endphp 
            @endforeach
        </tbody>
        
     </table>
     @endsection