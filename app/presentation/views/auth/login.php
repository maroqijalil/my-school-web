<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<?php 
$title = "Portal My School | Masuk";
include APP . 'presentation/views/components/head.php'; 
?>

<body>
  <div class="font-sans antialiased text-gray-900">
    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
      <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
        <div class="flex flex-col overflow-y-auto md:flex-row">
          <div class="h-32 md:h-auto md:w-1/2 flex flex-col justify-center">
            <img aria-hidden="true" class="object-center w-full" src="<?= URL . 'assets/img/bg-card.png' ?>" alt="Office" />
          </div>
          <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
            <div class="w-full">
              <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                Selamat Datang pada Portal Pembelajaran My School
              </h1>
              <form method="POST" action="">
                <label class="block text-sm">
                  <span class="block text-sm font-medium text-gray-700">Email</span>
                  <div class="mt-1">
                    <input id="email" name="email" type="email" autocomplete="email" required="" class="
                      appearance-none
                      block
                      w-full
                      px-3
                      py-2
                      border border-gray-300
                      rounded-md
                      shadow-sm
                      placeholder-gray-400
                      focus:outline-none
                      focus:ring-sp-primary-400
                      focus:border-sp-primary-400
                      sm:text-sm
                    " />
                  </div>
                </label>
                <label class="block mt-4 text-sm">
                  <span class="block text-sm font-medium text-gray-700">Password</span>
                  <div class="mt-1">
                    <input id="password" name="password" type="password" autocomplete="current-password" required="" class="
                      appearance-none
                      block
                      w-full
                      px-3
                      py-2
                      border border-gray-300
                      rounded-md
                      shadow-sm
                      placeholder-gray-400
                      focus:outline-none
                      focus:ring-sp-primary-400
                      focus:border-sp-primary-400
                      sm:text-sm
                    " />
                  </div>
                </label>
                <div class="flex items-center mt-4">
                  <input id="remember_me" name="remember_me" type="checkbox" class="
                      h-4
                      w-4
                      text-sp-primary-400
                      focus:ring-sp-primary-400
                      border-gray-300
                      rounded
                    " />
                  <label for="remember_me" class="ml-2 block text-sm text-gray-900">
                    Ingat saya
                  </label>
                </div>
                <button type="submit" class="
                    w-full
                    flex
                    justify-center
                    py-2
                    px-4
                    border border-transparent
                    rounded-md
                    shadow-sm
                    text-sm
                    font-medium
                    text-white
                    bg-sp-primary-400
                    hover:bg-sp-primary-300
                    focus:outline-none
                    focus:ring-2
                    focus:ring-offset-2
                    focus:ring-sp-primary-400
                    mt-4
                  " name="login">
                  Masuk
                </button>
              </form>

              <p class="mt-4">
                <div class="text-sm">
                  <a href="/daftar" class="
                      font-medium
                      text-sp-primary-400
                      hover:text-sp-primary-300
                    ">
                    Belum punya Akun? Daftar
                  </a>
                </div>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>