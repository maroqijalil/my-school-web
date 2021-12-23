<header class="flex z-10 py-4 bg-white shadow-md dark:bg-gray-800">
  <div class="container flex items-center justify-between h-full px-3 mx-auto text-sp-primary-400 dark:text-sp-primary-400">
    <button class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-sp-primary" @click="toggleSideMenu" aria-label="Menu">
      <svg class="w-6 h-6" aria-hidden="true" fill="#0067ae
" viewBox="0 0 20 20">
        <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
      </svg>
    </button>
    <div class="flex justify-center flex-1 lg:mr-32">
      <div class="relative w-full max-w-xl mr-6 focus-within:text-sp-primary-400">
        <div class="absolute inset-y-0 flex items-center pl-2">
          <svg class="w-4 h-4" aria-hidden="true" fill="#6aaff1" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
          </svg>
        </div>
        <input class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-sp-primary-400 focus:outline-none focus:shadow-outline-sp-primary form-input" type="text" placeholder="Cari mahasiswa" aria-label="Search" />
      </div>
    </div>
    <ul class="flex items-center flex-shrink-0 space-x-6">
      <li class="relative z-10">
        <button class="align-middle rounded-full focus:shadow-outline-sp-primary focus:outline-none" @click="toggleProfileMenu" @keydown.escape="closeProfileMenu" aria-label="Account" aria-haspopup="true">
          <img class="object-cover w-8 h-8 rounded-full" src="https://cdn1-production-images-kly.akamaized.net/NpSkxEAUZsogHK1-HG4KlurfdSM=/0x248:2423x1613/640x360/filters:quality(75):strip_icc():format(jpeg)/kly-media-production/medias/3412481/original/055674500_1616773504-115383249_m.jpeg" alt="" aria-hidden="true" />
        </button>

        <template x-if="isProfileMenuOpen">
          <ul x-transition:leave="z-10 transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click.away="closeProfileMenu" @keydown.escape="closeProfileMenu" class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:border-gray-700 dark:text-gray-400 dark:bg-gray-700" aria-label="submenu">
            <li class="flex mt-2">
              <form method="POST" action="" class="inline-flex items-center w-full">
                <input name="logout" type="hidden">

                <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200" href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                  <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="#6aaff1">
                    <path d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                    </path>
                  </svg>
                  <span>Keluar</span>
                </a>
              </form>
            </li>
          </ul>
        </template>

      </li>
    </ul>
  </div>
</header>