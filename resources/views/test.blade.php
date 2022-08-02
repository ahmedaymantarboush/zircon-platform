<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('test',1)}}">
        {{--
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            ''
        --}}
        <input type="text" name="title">
        <input type="text" name="short_description">
        <input type="text" name="description">
        <input type="text" name="meta_keywords">
        <input type="text" name="meta_description">
        <input type="text" name="slug">
        <input type="text" name="published">
        <input type="text" name="show_in_main">
        <input type="text" name="promotinal_video_url">
        <input type="text" name="free">
        <input type="text" name="price">
        <input type="text" name="final_price">
        <input type="text" name="discount_expiry_date">
        <input type="text" name="semester">
        <input type="text" name="poster">
        <input type="submit" name="f" value="ffffff" id="">
    </form>
    {{Session::get('errors')}}
    @error('poster')
    {{$message}}
    @enderror
</body>
</html>
