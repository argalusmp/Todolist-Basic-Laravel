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

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTodo">
            Add Todo
        </button>

        <!-- Modal -->
        <div class="modal fade" id="addTodo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog  modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Todo List</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" action="/todolist">
                        <div class="modal-body">

                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="subjek" placeholder="subjek">
                                <label for="subjek">Subjek</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control mb-2" name="todo" placeholder="todo">
                                <label for="todo">Todo</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Todo</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
    <div class="container col-xl-10 col-xxl-8 px-4 py-5">
        <div class="mx-auto">
            {{-- <form id="deleteForm" method="post" style="display: none">

            </form> --}}
            <table class="table table-hover ">
                <thead class="bg-info text-dark">
                    <tr>
                        <th scope="col">#ID</th>
                        <th scope="col">Subjek</th>
                        <th scope="col">Todo</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($todolist as $todo)
                        <tr>
                            <th scope="row">{{ $todo['id'] }}</th>
                            <td>{{ $todo['todo'] }}</td>
                            <td>{{ $todo['subjek'] }}</td>
                            <td>
                                <form action="/todolist/{{ $todo['id'] }}/delete" method="post">
                                    @csrf

                                    <button class="w-75 btn btn-lg btn-danger" type="submit"><i
                                            class="fa-regular fa-trash-can mx-auto"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#myBtn").click(function() {
                $("#myModal").modal();
            });
        });
    </script>
</body>

</html>
