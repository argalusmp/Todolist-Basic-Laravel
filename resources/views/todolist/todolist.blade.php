<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <script src="https://kit.fontawesome.com/a543fba6bd.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container col-xl-10 col-xxl-8 px-4 py-5">

        @if (isset($error))
            <div class="row">
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
            </div>
        @endif

        @if (session()->has('welcomeBack'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('welcomeBack') }}
                {{ auth()->user()->username }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session()->has('update-success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('update-success') }}

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session()->has('delete-success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('delete-success') }}

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row">
            <form method="post" action="/logout">
                @csrf
                <button class="w-15 btn btn-lg btn-danger" type="submit">Sign Out</button>
            </form>
        </div>

        <div class="row align-items-center g-lg-5 py-5">
            <div class="col-lg-7 text-center text-lg-start">
                <h1 class="display-4 fw-bold lh-1 mb-3">Todolist</h1>
            </div>
        </div>

        <!-- Button trigger modal Create Todolist -->
        <button type="button" class="btn btn-primary AddTodoBtn" data-bs-toggle="modal"
            data-bs-target="#ModalCreateUpdateTodo">
            Add Todo
        </button>

    </div>
    <div class="container col-xl-10 col-xxl-8 px-4 py-5">
        <div class="mx-auto">

            <table class="table table-hover ">
                <thead class="bg-info text-dark">
                    <tr>
                        <th scope="col">Index</th>
                        <th scope="col">Subjek</th>
                        <th scope="col">Todo</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($todolist as $todo)
                        <tr>
                            <td scope="row">{{ $loop->iteration }}</td>
                            <td>{{ $todo->subjek }}</td>
                            <td>{{ $todo->todo }}</td>
                            <td>
                                <a href="/todolist/{{ $todo->id }}/edit" class="badge bg-info OpenModalUpdate "
                                    data-bs-toggle="modal" data-bs-target="#ModalCreateUpdateTodo"
                                    data-id="{{ $todo->id }} "><i class="fa-solid fa-sm fa-pen-to-square"></i></a>
                                <form action="/todolist/{{ $todo->id }}/delete" method="post" class="d-inline">
                                    @csrf
                                    <button class="badge bg-danger border-0" type="submit"
                                        onclick="return confirm('Are You Sure?')"><i
                                            class="fa-regular
                                        fa-sm fa-trash-can mx-auto"></i></button>
                                </form>

                            </td>
                        </tr>
                        <!-- Modal Update Todolist-->
                        <div class="modal fade" id="ModalCreateUpdateTodo" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog  modal-dialog-centered">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h5 class="modal-title" id="FormModalLabel">Update Todo List</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    {{-- action change in jQuery in File script.js in public/js folder --}}
                                    <form method="post" action="todolist/{{ $todo->id }}/update">
                                        <input type="hidden" name="edit-id" id="edit-id">
                                        <div class="modal-body">
                                            @csrf
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="subjek"
                                                    placeholder="subjek" id="edit-subjek" required
                                                    value="{{ old('subjek') }}">
                                                <label for="subjek">Subjek</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control mb-2" name="todo"
                                                    placeholder="todo" value="{{ old('todo') }}" id="edit-todo"
                                                    required>
                                                <label for="todo">Todo</label>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/script.js') }}"></script>

</body>

</html>
