<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Expenses</title>
</head>
<body>
@include('include.header')
<div class="container mt-5">
        <div class="row">
            <div class="col-md-12">

                @if (session('message'))
                    <h4 class="alert alert-success">{{ session('message') }}</h4>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4>Expenses 
                            <a href="{{ route('expenses.create') }}" class="btn btn-primary float-end">Add Expenses</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <td>Expense</td>
                                    <td>Price</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($expenses as $expense)
                                <tr>
                                    <td>{{ $expense->exp }}</td>
                                    <td>{{ $expense->price }}</td>
                                    <td>
                                        <a href="{{ route('expenses.edit', $expense->id) }}" class="btn btn-success mx-2">Edit</a>
                                        <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-success mx-2" onclick="return confirm('Are you Sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>


</body>
</html>