<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Students</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/cs/bootstrap.min.css" rel="stylesheet" >
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
                        <h4>Add Expenses
                            <a href="{{ url('expenses')}}" class="btn btn-primary float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('expenses')}}" method="POST">
                            @csrf

                            <h4>Expenses</h4>
                            <div class="mb-3">
                                <label>Expense</label>
                                <input type="text" name="exp" value="{{old('exp')}}" required>
                                @error('exp') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <label>Price</label>
                                <input type="text" name="price" value="{{old('price')}}" required>
                                @error('price') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>