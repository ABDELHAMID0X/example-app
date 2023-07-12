<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

<div class="flex justify-end w-[80%] mx-auto mt-10">
   <form action="{{route('logout')}}" method="POST">
    @csrf
    @method('DELETE')
    <button class="bg-red-600 py-2 px-3 text-white rounded-lg">LogOut</button>
   </form>
</div>

<div class="relative overflow-x-auto my-32 ">
    <div class="mx-auto w-96"><button class="bg-green-500 px-4 py-1.5  rounded-lg"><a href="/ajouter">ADD</a></button></div>
    <table class="w-[600px] mx-auto text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th  scope="col" class="px-6 py-3">
                    title
                </th>
                <th scope="col" class="px-6 py-3">
                    auteur
                </th>
                <th scope="col" class="px-6 py-3">
                    date de publication
                </th>
                <th scope="col" class="px-6 py-3">
                    desciption
                </th>
                <th scope="col" class="px-6 py-3">
                    cover image
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Books as $book)


            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$book->title}}
                </th>
                <td class="px-6 py-4">
                    {{$book->auteur}}
                </td>
                <td class="px-6 py-4">
                    {{$book->published_date}}
                </td>
                <td class="px-6 py-4">
                    {{$book->desciption}}
                </td>
                <td class="px-6 py-4">
                    <img src="{{ $book->cover_image }}" style="height: 50px;width:100px;">
                    {{-- {{$book->cover_image}} --}}
                </td>
                <td class="px-6 flex text-white py-4">

                    <button class="bg-yellow-500 px-4 py-1.5 mx-2 rounded-lg"><a href="/update/{{$book->id}}" >Edit</a></button>
                    <button class="bg-red-500 px-4 py-1.5  rounded-lg"><a href="/delete/{{$book->id}}" >Delete</a></button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
