<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>
<body>
    <h1>Create New Game</h1>
    <form method="POST" action="/games-store">
        @csrf
        <label>Title:
            <input name="title"></input>
        </label>    
        <label>Game Image:
            <input name="img_path"></input>
        </label>
        <button>Submit</button>
    </form>
</body>
</html>
<!-- $table->string("title");
            $table->integer("posts_amount");
            $table->string("img_path"); -->