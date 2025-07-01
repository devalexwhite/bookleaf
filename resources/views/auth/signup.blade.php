<x-layout title="Welcome to BookLeaf">
    @if ($errors->any())
        <div id="errors">
            <h5>Validation Errors</h5>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<div class="relative isolate bg-white h-screen">
  <div class="mx-auto grid max-w-7xl grid-cols-1 lg:grid-cols-2">
    <div class="relative px-6 pt-24 pb-20 sm:pt-32 lg:static lg:px-8 lg:py-48">
      <div class="mx-auto max-w-xl lg:mx-0 lg:max-w-lg">
        <div class="absolute inset-y-0 left-0 -z-10 w-full overflow-hidden bg-gray-100 ring-1 ring-gray-900/10 lg:w-1/2">
          <svg class="absolute inset-0 size-full mask-[radial-gradient(100%_100%_at_top_right,white,transparent)] stroke-gray-200" aria-hidden="true">
            <defs>
              <pattern id="83fd4e5a-9d52-42fc-97b6-718e5d7ee527" width="200" height="200" x="100%" y="-1" patternUnits="userSpaceOnUse">
                <path d="M130 200V.5M.5 .5H200" fill="none" />
              </pattern>
            </defs>
            <rect width="100%" height="100%" stroke-width="0" fill="white" />
            <svg x="100%" y="-1" class="overflow-visible fill-gray-50">
              <path d="M-470.5 0h201v201h-201Z" stroke-width="0" />
            </svg>
            <rect width="100%" height="100%" stroke-width="0" fill="url(#83fd4e5a-9d52-42fc-97b6-718e5d7ee527)" />
          </svg>
        </div>
        <div class="mb-24 sm:mb-32 lg:mb-16">
            <a href="/">
                <img src="/images/logo.svg" width="120" />
            </a>
        </div>
        <h2 class="text-4xl font-semibold tracking-tight text-pretty text-gray-900 sm:text-5xl">Welcome to BookLeaf!</h2>
        <p class="mt-6 text-lg/8 text-gray-600">Create your free account to get started.</p>
        <p class="mt-1 text-lg/8 text-gray-600">Been here before? <a class="underline text-blue-950" href="{{route('login')}}">Login</a></p>
      </div>
    </div>
    <form action="{{ route('users.store') }}" method="POST" class="px-6 pt-20 pb-24 sm:pb-32 lg:px-8 lg:py-48">
        @csrf
      <div class="mx-auto max-w-xl lg:mr-0 lg:max-w-lg">
        <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
          <div class="sm:col-span-2">
            <label for="email" class="block text-sm/6 font-semibold text-gray-900">Email</label>
            <div class="mt-2.5">
              <input type="email" name="email" id="email" autocomplete="email" class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600" />
            </div>
          </div>
          <div class="sm:col-span-2">
            <label for="password" class="block text-sm/6 font-semibold text-gray-900">Password</label>
            <div class="mt-2.5">
              <input type="password" name="password" id="password" class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600" />
            </div>
          </div>
          <div class="sm:col-span-2">
            <label for="confirm_password" class="block text-sm/6 font-semibold text-gray-900">Confirm Password</label>
            <div class="mt-2.5">
              <input type="password" name="confirm_password" id="confirm_password" class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600" />
            </div>
          </div>
        <div class="mt-8 flex justify-start">
          <button type="submit" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create Account</button>
        </div>
      </div>
    </form>
  </div>
</div>

</x-layout>
