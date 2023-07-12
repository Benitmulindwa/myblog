<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create an account</title>
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
        .message{
            text-align:left;
            color:red;
            margin-top:5px;
            font-size: 12px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
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

<body class="h-full">
    <div class="container">
        <h2>Create an account</h2>
        <form action="{{route('store')}}" 
              method="POST" 
              enctype="multipart/form-data">
        @csrf
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            @error('email')
                <p class="message">{{$message}}</p>
            @enderror

            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required>
            @error('email')
                <p class="message">{{$message}}</p>
            @enderror

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            @error('email')
                <p class="message">{{$message}}</p>
            @enderror

            <button type="submit">Create an account</button>
        </form>

        <p>Do you have an account? <a href="{{route('login')}}">Sign In</a></p>
    </div>
</body>

</html>
