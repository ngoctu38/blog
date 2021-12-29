<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
        .none{
            display: none;

        }

        .intro {
            display: block
        }

    </style>
    <!--js -->
{{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>

<!-- Button trigger modal -->
<div id="auto-load" >
<button  type="button"  id="show"   class="btn btn-primary auto-load" data-toggle="modal" data-target="#exampleModal">
    Bài viết <span id="total-quantity-show">{{$total}}</span>
</button>
<div class="modal-body none auto-load myElement" id="demo"  >
    <table>
        <tr>
            <th>Tiêu đề</th>
            <th>Nội dung</th>
            <th>Trạng thái</th>
        </tr>
        @foreach($data as $st)
            <tr>
                <td>{{$st->article_title }}</td>
                <td>{{$st->article_content}}</td>
                <td>{{$st->is_approve}}</td>
            </tr>
        @endforeach
    </table>
    <button class="btn btn-warning" onclick="Add()" id="hide">hide</button>
</div>
</div>
{{--<div class="modal-body">--}}
{{--    <table>--}}
{{--        <tr>--}}
{{--            <th>Tiêu đề</th>--}}
{{--            <th>Nội dung</th>--}}
{{--            <th>Trạng thái</th>--}}
{{--        </tr>--}}
{{--        @foreach($dataTotal as $st)--}}
{{--            <tr>--}}
{{--                <td>{{$st->article_title }}</td>--}}
{{--                <td>{{$st->article_content}}</td>--}}
{{--                <td>{{$st->is_approve}}</td>--}}
{{--            </tr>--}}
{{--        @endforeach--}}
{{--    </table>--}}
{{--</div>--}}


<script>
    function Add() {
        $.ajax({
            url : 'demo/add',
            type : 'GET',
        })
    }
    $(document).ready(function(){
        setInterval(function(){
            $('#auto-load').load('demo');
        },6000);
        $("#hide").click(function(){
            $("#demo").hide();
        });

        $("#show").click(function(){
            $("#demo").show();
        });
    });
</script>
</body>
</html>


