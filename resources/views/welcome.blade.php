<x-layout title="Ad-free, algorithm free, privacy-focused bookmarking.">
  <div class="relative">
    <div class="bg-gradient-to-r from-rose-400 via-fuchsia-500 to-indigo-500 absolute top-0 left-0 w-full h-full z-0">
    </div>
    <div class="dark:bg-black/60 bg-white/60 backdrop-blur-3xl">
      <div>
        <div class="relative isolate overflow-hidden">
          <div class="mx-auto max-w-7xl pt-10 pb-24 sm:pb-32 lg:grid lg:grid-cols-2 lg:gap-x-8 lg:px-8 lg:py-40">
            <div class="px-6 lg:px-0 lg:pt-4">
              <div class="mx-auto max-w-2xl">
                <div class="max-w-lg">
                  <div class="text-5xl">
                    <a href="/">
                      <img src="/images/logo.svg" width="120" class="block dark:hidden" />
                      <img src=" /images/logo-dark.svg" class="hidden dark:block" width="120" />
                    </a>
                  </div>
                  <div class="mt-24 sm:mt-32 lg:mt-16">
                    <a href="https://thatalexguy.dev/tags/bookleaf/" class="inline-flex space-x-6" target="_blank">
                      <span
                        class="flex flex-row gap-1 items-center justify-center rounded-full bg-indigo-600/10 dark:bg-indigo-200/10 px-3 py-1 text-sm/6 font-semibold text-indigo-600 dark:text-indigo-100 ring-1 ring-indigo-600/10 ring-inset">
                        Changelog
                        <svg class="size-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
                          data-slot="icon">
                          <path fill-rule="evenodd"
                            d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z"
                            clip-rule="evenodd" />
                        </svg>
                      </span>
                    </a>
                  </div>
                  <h1
                    class="mt-10 text-5xl font-semibold tracking-tight text-pretty text-gray-900 dark:text-gray-50 sm:text-7xl">
                    Bookmark
                    everything</h1>
                  <p class="mt-8 text-lg font-medium text-pretty text-gray-500 dark:text-gray-300 sm:text-xl/8">Privacy
                    focused, bookmarking
                    for the articles, books, videos, music, RSS feeds and websites you love.</p>
                  <div class="mt-10 flex items-center gap-x-6">
                    @auth
            <a href="{{ route('bookmarks.index') }}"
              class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-lg font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Your
              Bookmarks</a>
          @endauth
                    @guest
            <a href="{{ route('signup') }}"
              class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-lg font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Get
              Started</a>
            <a href="{{ route('login') }}"
              class="text-lg font-semibold text-gray-900 dark:text-gray-50">Login<span
              aria-hidden="true">→</span></a>
          @endguest
                  </div>
                </div>
              </div>
            </div>
            <div class="mt-20 sm:mt-24 md:mx-auto md:max-w-2xl lg:mx-0 lg:mt-0 lg:w-screen">
              <div class="bg-blue-300 rounded-xl overflow-hidden p-4">
                <img src="/images/home_screenshot.png" class="rounded-lg" />
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="mx-auto py-16 max-w-7xl px-6 lg:px-8">
        <dl
          class="mx-auto grid max-w-2xl grid-cols-1 gap-x-6 gap-y-10 text-base/7 text-gray-600 dark:text-gray-200 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-3 lg:gap-x-8 lg:gap-y-16">
          <div class="relative pl-9">
            <dt class="inline font-semibold text-gray-900 dark:text-gray-200">
              <svg class="absolute top-1 left-1 size-5 text-indigo-600 dark:text-indigo-200" viewBox="0 0 20 20"
                fill="currentColor" aria-hidden="true" data-slot="icon">
                <path fill-rule="evenodd"
                  d="M5.5 17a4.5 4.5 0 0 1-1.44-8.765 4.5 4.5 0 0 1 8.302-3.046 3.5 3.5 0 0 1 4.504 4.272A4 4 0 0 1 15 17H5.5Zm3.75-2.75a.75.75 0 0 0 1.5 0V9.66l1.95 2.1a.75.75 0 1 0 1.1-1.02l-3.25-3.5a.75.75 0 0 0-1.1 0l-3.25 3.5a.75.75 0 1 0 1.1 1.02l1.95-2.1v4.59Z"
                  clip-rule="evenodd" />
              </svg>
              Bookmark everything.
            </dt>
            <dd class="inline">Discover and remember music, articles, websites, RSS feeds, books and videos.</dd>
          </div>
          <div class="relative pl-9">
            <dt class="inline font-semibold text-gray-900 dark:text-gray-200">
              <svg class="absolute top-1 left-1 size-5 text-indigo-600 dark:text-indigo-200" viewBox="0 0 20 20"
                fill="currentColor" aria-hidden="true" data-slot="icon">
                <path fill-rule="evenodd"
                  d="M10 1a4.5 4.5 0 0 0-4.5 4.5V9H5a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-6a2 2 0 0 0-2-2h-.5V5.5A4.5 4.5 0 0 0 10 1Zm3 8V5.5a3 3 0 1 0-6 0V9h6Z"
                  clip-rule="evenodd" />
              </svg>
              Private, always.
            </dt>
            <dd class="inline">No ads, tracking or algorithms here.</dd>
          </div>
          <div class="relative pl-9">
            <dt class="inline font-semibold text-gray-900 dark:text-gray-200">
              <svg class="absolute top-1 left-1 size-5 text-indigo-600 dark:text-indigo-200" viewBox="0 0 20 20"
                fill="currentColor" aria-hidden="true" data-slot="icon">
                <path fill-rule="evenodd"
                  d="M15.312 11.424a5.5 5.5 0 0 1-9.201 2.466l-.312-.311h2.433a.75.75 0 0 0 0-1.5H3.989a.75.75 0 0 0-.75.75v4.242a.75.75 0 0 0 1.5 0v-2.43l.31.31a7 7 0 0 0 11.712-3.138.75.75 0 0 0-1.449-.39Zm1.23-3.723a.75.75 0 0 0 .219-.53V2.929a.75.75 0 0 0-1.5 0V5.36l-.31-.31A7 7 0 0 0 3.239 8.188a.75.75 0 1 0 1.448.389A5.5 5.5 0 0 1 13.89 6.11l.311.31h-2.432a.75.75 0 0 0 0 1.5h4.243a.75.75 0 0 0 .53-.219Z"
                  clip-rule="evenodd" />
              </svg>
              Share what you love.
            </dt>
            <dd class="inline">Create collections and share with others.</dd>
          </div>
          <div class="relative pl-9">
            <dt class="inline font-semibold text-gray-900 dark:text-gray-200">
              <svg class="absolute top-1 left-1 size-5 text-indigo-600 dark:text-indigo-200" viewBox="0 0 20 20"
                fill="currentColor" aria-hidden="true" data-slot="icon">
                <path fill-rule="evenodd"
                  d="M10 2.5c-1.31 0-2.526.386-3.546 1.051a.75.75 0 0 1-.82-1.256A8 8 0 0 1 18 9a22.47 22.47 0 0 1-1.228 7.351.75.75 0 1 1-1.417-.49A20.97 20.97 0 0 0 16.5 9 6.5 6.5 0 0 0 10 2.5ZM4.333 4.416a.75.75 0 0 1 .218 1.038A6.466 6.466 0 0 0 3.5 9a7.966 7.966 0 0 1-1.293 4.362.75.75 0 0 1-1.257-.819A6.466 6.466 0 0 0 2 9c0-1.61.476-3.11 1.295-4.365a.75.75 0 0 1 1.038-.219ZM10 6.12a3 3 0 0 0-3.001 3.041 11.455 11.455 0 0 1-2.697 7.24.75.75 0 0 1-1.148-.965A9.957 9.957 0 0 0 5.5 9c0-.028.002-.055.004-.082a4.5 4.5 0 0 1 8.996.084V9.15l-.005.297a.75.75 0 1 1-1.5-.034c.003-.11.004-.219.005-.328a3 3 0 0 0-3-2.965Zm0 2.13a.75.75 0 0 1 .75.75c0 3.51-1.187 6.745-3.181 9.323a.75.75 0 1 1-1.186-.918A13.687 13.687 0 0 0 9.25 9a.75.75 0 0 1 .75-.75Zm3.529 3.698a.75.75 0 0 1 .584.885 18.883 18.883 0 0 1-2.257 5.84.75.75 0 1 1-1.29-.764 17.386 17.386 0 0 0 2.078-5.377.75.75 0 0 1 .885-.584Z"
                  clip-rule="evenodd" />
              </svg>
              Open-source.
            </dt>
            <dd class="inline">Built for the community, with the community.</dd>
          </div>
          <div class="relative pl-9">
            <dt class="inline font-semibold text-gray-900 dark:text-gray-200">
              <svg class="absolute top-1 left-1 size-5 text-indigo-600 dark:text-indigo-200" viewBox="0 0 20 20"
                fill="currentColor" aria-hidden="true" data-slot="icon">
                <path fill-rule="evenodd"
                  d="M7.84 1.804A1 1 0 0 1 8.82 1h2.36a1 1 0 0 1 .98.804l.331 1.652a6.993 6.993 0 0 1 1.929 1.115l1.598-.54a1 1 0 0 1 1.186.447l1.18 2.044a1 1 0 0 1-.205 1.251l-1.267 1.113a7.047 7.047 0 0 1 0 2.228l1.267 1.113a1 1 0 0 1 .206 1.25l-1.18 2.045a1 1 0 0 1-1.187.447l-1.598-.54a6.993 6.993 0 0 1-1.929 1.115l-.33 1.652a1 1 0 0 1-.98.804H8.82a1 1 0 0 1-.98-.804l-.331-1.652a6.993 6.993 0 0 1-1.929-1.115l-1.598.54a1 1 0 0 1-1.186-.447l-1.18-2.044a1 1 0 0 1 .205-1.251l1.267-1.114a7.05 7.05 0 0 1 0-2.227L1.821 7.773a1 1 0 0 1-.206-1.25l1.18-2.045a1 1 0 0 1 1.187-.447l1.598.54A6.992 6.992 0 0 1 7.51 3.456l.33-1.652ZM10 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"
                  clip-rule="evenodd" />
              </svg>
              Own your data.
            </dt>
            <dd class="inline">Export your bookmarks at anytime in a human readable format.</dd>
          </div>
        </dl>
      </div>
    </div>
  </div>
</x-layout>