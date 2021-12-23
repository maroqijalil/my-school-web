<div x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"></div>

<aside class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden" x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150" x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0 transform -translate-x-20" @click.away="closeSideMenu" @keydown.escape="closeSideMenu">
  <div class="py-4 text-gray-500 dark:text-gray-400">
    <div class="flex justify-start lg:w-0 lg:flex-1">
      <a href="#">
        <span class="sr-only">My School</span>
        <img class="h-14 w-auto sm:h-16" src="<?= URL . 'assets/img/bg-sidebar.png' ?>" alt="" />
      </a>
    </div>
    <ul>
      <li class="relative px-6 py-3">
        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="#">
          <?php include APP . 'presentation/views/components/icons/grad.php'; ?>
          <span class="ml-4">Siswa</span>
        </a>
      </li>
      <li class="relative px-6 py-3">
        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="#">
          <?php include APP . 'presentation/views/components/icons/briefcase.php'; ?>
          <span class="ml-4">Guru</span>
        </a>
      </li>
      <li class="relative px-6 py-3">
        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="#">
          <?php include APP . 'presentation/views/components/icons/users.php'; ?>
          <span class="ml-4">Orang Tua Wali</span>
        </a>
      </li>
      <li class="relative px-6 py-3">
        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="#">
          <?php include APP . 'presentation/views/components/icons/clipboard.php'; ?>
          <span class="ml-4">Pembayaran Sekolah</span>
        </a>
      </li>
    </ul>
  </div>
</aside>
