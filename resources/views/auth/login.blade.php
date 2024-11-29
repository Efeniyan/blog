<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/login" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Entrez votre email">
            @error('title')
            <div style="color: red;">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="pasword">Password</label>
            <input type="password" id="password" name="password" >
            @error('title')
            <div style="color: red;">{{$message}}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <button type="submit">Se connecter</button>
        </div>
    
    </form>
    
</body>
</html>
