<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Simple Notes</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6 bg-gray-50">
  <div class="max-w-xl mx-auto bg-white p-6 rounded shadow">

    <h1 class="text-2xl mb-4">My Notes</h1>

    <form action='/add' method='post'class=mb-6 space-y-2>
        @csrf
        <input 
            name='title'
            type='text'
            placeholder='Note title'
            class='w-full border p-2'
            value='{{ old("title") }}'
            required
        >
        <textarea 
            name='body' rows="4"
            class='w-full border p-2'
            placeholder="optional details..."
            >{{ old("body") }}</textarea>
        <button 
            class="bg-blue-500 text-white px-4 py-2 rounded">
            Add Note
        </button>
        

        <ul class=space-y-4>
          @foreach($notes as $note)
          <li class="border p-4 rounded">
            <div>
            <h2 class="font-semibold">{{ $note->title}}</h2>
            @if($note->body)
            <p class="mt-2 text-gray-700 whitespace-pre-wrap">{{ $note->body }}</p>
            @endif
            </div>
            
            <form action='/delete/{{$note->id}}' method='post'>
              @csrf
              @method('DELETE')
              <button class="text-red-600 hover:text-red-800">
          🗑️
        </button>
      </form>

          </li>
          @endforeach
        </ul>
        
  </div>
</body>
</html>