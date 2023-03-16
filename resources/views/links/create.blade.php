<x-app-layout>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto flex flex-wrap items-center">

          <div class="lg:w-1/3 md:w-1/2 lg:mx-auto bg-gray-100 rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0 border border-gray-300 shadow">
            <h2 class="text-gray-900 text-lg font-medium title-font mb-5">Create Link</h2>
            <form action="{{ route('links.store') }}" method="POST">
                @csrf
                <div class="relative mb-4">
                    <label for="name" class="leading-7 text-sm text-gray-600 font-bold">Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="(e.g. Facebook, Youtube, Twitter,...)" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    {{-- validation message --}}
                    @error('name')
                        <small class="text-red-500">
                            {{ $message }}
                        </small>
                    @enderror
                  </div>
                  <div class="relative mb-4">
                    <label for="url" class="leading-7 text-sm font-bold text-gray-600">Link</label>
                    <input type="text" id="link" name="url" value="{{ old('url') }}" placeholder="(e.g. https://www.youtube.com/@user1)" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    {{-- validation message --}}
                    @error('url')
                        <small class="text-red-500">
                            {{ $message }}
                        </small>
                    @enderror
                  </div>
                  <div class="flex justify-between space-x-3">
                    <button class="text-white w-full bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Create</button>
                    <a href="{{ route('links.index') }}" class="text-white text-center w-full bg-gray-500 border-0 py-2 px-8 focus:outline-none hover:bg-gray-600 rounded text-lg">Cancel</a>
                  </div>
                </div>
            </form>
        </div>
      </section>
</x-app-layout>
