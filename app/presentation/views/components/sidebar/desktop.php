<aside class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0">
  <div class="py-4 text-gray-500 dark:text-gray-400">
    <div class="flex justify-start lg:ml-2 lg:flex-1 mb-4">
      <a href="#">
        <span class="sr-only">My School</span>
        <img class="h-14 w-auto sm:h-16" src="<?= URL . 'assets/img/bg-sidebar.png' ?>" alt="" />
      </a>
    </div>
    <ul>
      <li class="relative px-6 py-3">
        <?php if ($page == "guru") { ?>
          <span class="absolute inset-y-0 left-0 w-2 bg-sp-primary-100 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
        <?php } ?>
        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="#">
          <?php include APP . 'presentation/views/components/icons/briefcase.php'; ?>
          <span class="ml-4">Guru</span>
        </a>
      </li>
      <li class="relative px-6 py-3">
        <?php if ($page == "siswa") { ?>
          <span class="absolute inset-y-0 left-0 w-2 bg-sp-primary-100 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
        <?php } ?>
        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="#">
          <?php include APP . 'presentation/views/components/icons/grad.php'; ?>
          <span class="ml-4">Siswa</span>
        </a>
      </li>
      <li class="relative px-6 py-3">
        <?php if ($page == "wali") { ?>
          <span class="absolute inset-y-0 left-0 w-2 bg-sp-primary-100 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
        <?php } ?>
        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="#">
          <?php include APP . 'presentation/views/components/icons/users.php'; ?>
          <span class="ml-4">Wali</span>
        </a>
      </li>
      <li class="relative px-6 py-3">
        <?php if ($page == "pembayaran") { ?>
          <span class="absolute inset-y-0 left-0 w-2 bg-sp-primary-100 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
        <?php } ?>
        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="#">
          <?php include APP . 'presentation/views/components/icons/clipboard.php'; ?>
          <span class="ml-4">Pembayaran Sekolah</span>
        </a>
      </li>
    </ul>
  </div>
</aside>