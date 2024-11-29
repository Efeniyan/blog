<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/register" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" id="nom" name="name"  placeholder="Entrez le nom">
            @error('name')
            <div style="color: red;">{{'Champs obligatoire *'}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Entrez votre email">
            @error('title')
            <div style="color: red;">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="pasword">Password</label>
            <input type="password" id="pasword" name="password" >
            @error('title')
            <div style="color: red;">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="paswordConfirm">PasswordConfirm</label>
            <input type="password" id="paswordConfirm" name="paswordConfirm" >
            @error('title')
            <div style="color: red;">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <button type="submit">S'inscrire</button>
        </div>
    
    </form>  
</body>
</html>