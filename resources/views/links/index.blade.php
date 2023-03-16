<x-app-layout>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-12 mx-auto">
          <div class="flex flex-col text-center w-full mb-10">
            <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">Dashboard</h1>
            <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Customize your links and check visits here</p>
          </div>
          <div class="lg:w-2/3 w-full mx-auto overflow-auto">
            <table class="table-auto border-collapse border border-slate-300 w-full text-left whitespace-no-wrap table">
              <thead class="border border-slate-300">
                <tr class="border border-slate-300border border-slate-300 ">
                  <th class="border border-slate-300 px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-xs md:text-lg bg-gray-100 rounded-tl rounded-bl">Name</th>
                  <th class="border border-slate-300 px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-xs md:text-lg bg-gray-100">Url</th>
                  <th class="border border-slate-300 px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-xs md:text-lg bg-gray-100 text-center">Visits</th>
                  <th class="border border-slate-100 px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-xs md:text-lg bg-gray-100 text-center hidden md:flex">Last visited</th>
                  <th class="border border-slate-300 px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-xs md:text-lg bg-gray-100 text-center">Action</th>
                </tr>
              </thead>
              <hr>
              <tbody>
                @foreach ($links as $link)
                <tr>
                    <td class="px-4 text-xs md:text-sm py-3 border border-slate-300">{{ $link->name }}</td>
                    <td class="px-4 text-xs md:text-sm py-3 border border-slate-300">
                        <a href="{{  $link->url }}" class="cursor-pointer text-blue-500" target="_blank">{{ $link->url }}</a>
                    </td>
                    <td class="px-4 text-xs md:text-sm py-3 text-center border border-slate-300">
                        {{ $link->visits_count }}
                    </td>
                    <td class="px-4 text-xs md:text-sm py-3  border border-slate-200 hidden md:block">
                        {{ $link->latest_visit ? $link->latest_visit->created_at->format('M d, Y h:i a') : 'N/A' }}
                    </td>
                    <td class="text-xs md:text-sm text-center border border-slate-300">
                      <a href="{{ route('links.edit', $link->id) }}" class=" text-blue-500 border-0 py-2 px-2 focus:outline-none  rounded">Edit</a>
                    <form action="{{ route('links.destory', $link->id) }}" method="post" class="inline-block">
                        @csrf
                        @method('DELETE')

                        <button class="text-red-500 border-0 py-2 px-2 focus:outline-none rounded sm-hidden hidden md:block">Remove</button>
                    </form>
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="flex pl-4 mt-4 lg:w-2/3 w-full mx-auto">
            <a href="{{ route('links.create') }}" class="text-xs md:text-sm flex ml-auto text-white bg-indigo-500 border-0 py-2 px-3 md:px-6 focus:outline-none hover:bg-indigo-600 rounded">Add new Link</a>
          </div>
        </div>
      </section>

      {{-- flash message using alphine js and tailwind --}}
    @if (session('success'))
        <div
        x-data = "{ show: true }"
        x-init = "setTimeout(() => show = false, 3000)"
        x-show = "show"
        class="fixed bottom-4 left-3 bg-blue-500 text-white py-2 px-3 rounded text-sm">
        <p> {{ session('success') }} </p>
        </div>
    @endif
</x-app-layout>
