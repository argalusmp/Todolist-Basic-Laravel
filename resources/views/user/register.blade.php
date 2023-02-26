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

        <div class="row align-items-center g-lg-5 py-5">
            <div class="col-lg-2 text-center text-lg-start">
                <h2 class="display-2 fs-2 fw-bold lh-1 mb-1">TodoList App</h2>
                <h2 class="display-2 fw-light lh-1 mb-3">Register</h2>
            </div>
            <div class="col-md-10 mx-auto col-lg-5">
                <form class="p-4 p-md-5 border rounded-3 bg-light" method="post" action="/register">
                    @csrf
                    <div class="form-floating mb-3">
                        <input name="username" type="text"
                            class="form-control @error('username') is-invalid @enderror" id="username"
                            placeholder="Username..." required value="{{ old('username') }}">
                        <label for="username">User</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            id="email" placeholder="email@example.com" autocomplete="off" required
                            value="{{ old('email') }}">
                        <label for="email">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="password" type="password" class="form-control" id="password"
                            placeholder="password" required>
                        <label for="password">Password</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign Up</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
