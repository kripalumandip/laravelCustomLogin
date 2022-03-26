<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
            crossorigin="anonymous"
        />

        <title>Custom Authentication</title>
    </head>
    <body>
        <div class="container">
            <h2 class="mt-3 mb-3">Registration form</h2>
            <form action="{{ route('register-user') }}" method="post">
                @if(Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
                @endif @if(Session::has('fail'))
                <div class="alert alert-danger">
                    {{Session::get('fail')}}
                </div>
                @endif @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label"
                        >Name</label
                    >
                    <input
                        name="name"
                        type="text"
                        class="form-control"
                        id="exampleInputEmail1"
                        aria-describedby="emailHelp"
                        required
                    />
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label"
                        >Email address</label
                    >
                    <input
                        name="email"
                        type="email"
                        class="form-control"
                        id="exampleInputEmail1"
                        aria-describedby="emailHelp"
                        required
                    />
                    <span class="text-danger"
                        >@error('email'){{ $message }} @enderror</span
                    >
                    <div id="emailHelp" class="form-text">
                        We'll never share your email with anyone else.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label"
                        >Password</label
                    >
                    <input
                        name="pass"
                        type="password"
                        class="form-control"
                        id="exampleInputPassword1"
                        required
                    />
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <br />
            <a href="login">Already registered !! Login here</a>
        </div>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
