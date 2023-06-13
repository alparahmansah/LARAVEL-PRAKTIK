@extends('template/admin/index')

@section('content')

<h2>FORM INPUT CUSTOMERS</h2>

<form action="{{ route('customers.store') }}" method="POST">
    @csrf
    <div class = "form-group">
        <label for="name">Nama Pelanggan</label>
        <input type="text" name="name" id="name" value="" class="form-control">
    </div>

    <div class = "form-group">
        <label for="address">Alamat</label>
        <input type="text" name="address" id="address" value="" class="form-control">
    </div>

    <div class = "form-group">
        <label for="no_hp">No HP</label>
        <input type="text" name="no_hp" id="no_hp" value="" class="form-control">
    </div>

   <a href="customers.admin"> <button type="submit" class="btn btn-success" > Add</button></a>
</form>


@endsection

