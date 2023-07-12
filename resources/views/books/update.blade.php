<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
 <div class="w-full min-h-screen flex items-center">

    <div class="w-96 mx-auto p-5 bg-gray-200 rounded-lg ">

        @if(session('status'))
                <div class="">
                    {{session('status')}}
                </div>
        @endif

            @foreach($errors ->all() as $error)

            @endforeach
        <form action="/update/traitement" method="POST">
        @csrf
        <input type="text" class="hidden"  name="id" id="id"  value="{{$Books->id}}" >
        <label>First name</label><br>
        <input
        name="title"
        id="title"
        type="text"
        value="{{$Books->title}}"
        class="w-full rounded-lg py-1.5 px-2 bg-white border-gray-400">

        <label>Last name</label><br>
        <input name="auteur"
        value="{{$Books->auteur}}"
        id="auteur" type="text" class="w-full rounded-lg py-1.5 px-2 bg-white border-gray-400">

        <label>Age</label><br>
        <input name="published_date"
        value="{{$Books->published_date}}"
        id="published_date" type="text" class="w-full rounded-lg py-1.5 px-2 bg-white border-gray-400">



        <label>desciption</label><br>
        <input name="desciption" id="desciption"   value="{{$Books->desciption}}" type="text" class="w-full rounded-lg py-1.5 px-2 bg-white border-gray-400">

        <label>cover_image</label><br>
        <input name="cover_image" id="cover_image"   value="{{$Books->cover_image}}" type="text" class="w-full rounded-lg py-1.5 px-2 bg-white border-gray-400">


        <button class="bg-green-500 py-1.5 px-3 rounded-lg my-2">Update</button>
        <button class="bg-blue-500 py-1.5 px-3 rounded-lg my-2"><a href="/etudiant">Back</a></button>
    </form>

    </div>

 </div>
</body>
</html>
