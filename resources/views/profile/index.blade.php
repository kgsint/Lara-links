<x-guest-layout>
    <section class="text-gray-600 body-font">
        <div class="container px-4 w-full md:w-1/2 px-4  mx-auto flex py-12 mt-12 items-center justify-center flex-col bg-gray-200 rounded">

        {{-- check the user has profile image or not --}}
        @if ($user->image)
            <img
            class=" mb-10 object-cover object-center rounded-full" alt="profile image"
            src="{{ asset('storage/profile-images/' . $user->image) }}" style="width:100px;height:100px;">
        @else
            <img class=" mb-10 object-cover object-center rounded-full" alt="hero" src="https://dummyimage.com/240x240" width="100" height="100">
        @endif

          <div class="text-center lg:w-2/3 w-full">
            <h1 class="title-font md:text-3xl text-md mb-4 font-medium text-gray-900">{{ "@" . $user->username }}</h1>
            <p class="mb-8 text-xs md:text-sm text-center text-gray-700">
                {{ $user->description ?? '' }}
            </p>
            <div class="flex justify-center flex-col">
                @foreach ($user->links as $link)
                    <a href="{{ $link->url }}"
                        class="user-link border border-gray-900 py-4 mb-3"
                        target="_blank" data-link-id="{{ $link->id }}">
                        {{ $link->name }}
                    </a>
                @endforeach
            </div>
          </div>
        </div>
      </section>
</x-guest-layout>
