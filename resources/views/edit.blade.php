<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Students</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">

                @if (session('status'))
                    <div class="alert alert">{{session('status')}}</div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>Edit Expenses
                            <a href="{{ url('expenses')}}" class="btn btn-primary float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('expenses/'.$expense->id)}}" method="POST">
                            @csrf
                            @method('PUT')

                            <h4>Expenses</h4>
                            <div class="mb-3">
                                <label>Expense</label>
                                <input type="text" name="exp" value="{{$expense->exp}}" required>
                                @error('exp') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <label>Price</label>
                                <input type="text" name="price" value="{{$expense->price}}" required>
                                @error('price') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>