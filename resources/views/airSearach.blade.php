
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<button class="airSearch" type="button" data-url="{{route('airSearch')}}">Search</button>
<div id="searchData"></div>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
    $('.airSearch').click(function (e){

        var url= "{{route('airPrice')}}";
        $.ajax({
            url:$(this).attr('data-url'),
            method:"GET",
            success:function (r){

               var fullData= r.data;
                console.log(fullData);
                for (const key in fullData) {
                    console.log(fullData[key]);
                    $.ajax({
                        url:url,
                        method:"GET",
                        data:{value:fullData[key]},
                        success:function (e){

                            $("#searchData").append(e);
                        }
                    });
                }
            }
        });
    });
</script>
</body>
</html>
