<x-app-layout>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto flex flex-wrap items-center">

          <div class="lg:w-1/3 md:w-1/2 lg:mx-auto bg-gray-100 rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0 border border-gray-300 shadow">
            <h2 class="text-gray-900 text-lg font-medium title-font mb-5">Edit Profile</h2>
            {{-- form --}}
            <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="relative mb-4">
                    <label for="username" class="leading-7 text-sm font-bold text-gray-600">Username</label>
                    <input type="text" id="username" name="username" value="{{ old('username', $user->username) }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    {{-- validation message --}}
                    @error('username')
                        <small class="text-red-500">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                <div class="relative mb-4">
                    <label for="image" class="leading-7 text-sm text-gray-600 font-bold">Profile Picture</label>
                    <input type="file" id="image" name="image" accept="image/png, image/jpeg" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    {{-- validation message --}}
                    @error('image')
                        <small class="text-red-500">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                <div class="relative mb-4">
                    <label for="description" class="leading-7 text-sm text-gray-600 font-bold">Description</label>
                    <textarea id="description" name="description" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-16 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{ $user->description ?? "" }}
                    </textarea>
                    {{-- validation message --}}
                    @error('description')
                        <small class="text-red-500">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                  <div class="flex justify-between space-x-3">
                    <button class="text-white w-full bg-indigo-500 border-0 py-2 px-4 focus:outline-none hover:bg-indigo-600 rounded text-sm">Save</button>
                    <a href="{{ route('links.index') }}" class="text-white text-center w-full bg-gray-500 border-0 py-2 px-8 focus:outline-none hover:bg-gray-600 rounded text-sm">Cancel</a>
                  </div>
                </div>
            </form>
        </div>
      </section>
</x-app-layout>
