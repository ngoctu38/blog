<!DOCTYPE HTML>
<html>
<body>

<form action="demo.create" method="post">
    @csrf
    title: <input type="text" name="article_title"><br>
    content: <input type="text" name="article_content"><br>
    <input type="submit">
</form>

</body>
</html>
