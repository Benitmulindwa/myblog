<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
        }

        .container {
            max-width: 400px;
            margin: 80px auto;
            padding: 20px;
            background-color: #f0f7f4;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .message{
            text-align:left;
            color:red;
            margin-top:5px;
            font-size: 12px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            color: #555;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        button {
            padding: 10px;
            background-color: green;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #4f9e80;
        }

        p {
            text-align: center;
            margin-top: 20px;
        }

        p a {
            color: #67c3a1;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Login</h2>
        <form action="{{route('authentification')}}" method="POST" enctype="multipart/form-data">
        @csrf

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li class="message">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required>
            

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">LogIn</button>
        </form>

        <p>Don't have an account? <a href="{{route('registration')}}">Sign up</a></p>
    </div>
</body>

</html>
