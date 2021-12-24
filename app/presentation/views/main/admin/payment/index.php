<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<?php
$title = "Portal My School | pembayaran";
include APP . 'presentation/views/components/head.php';
?>

<body>
  <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">

    <?php
    $page = "pembayaran";
    include APP . 'presentation/views/components/sidebar/desktop.php';
    ?>
    <?php include APP . 'presentation/views/components/sidebar/mobile.php'; ?>

    <div class="flex flex-col flex-1 w-full">

      <?php include APP . 'presentation/views/components/header.php'; ?>

      <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
          <h2 class="mt-6 text-3xl font-bold text-gray-900">
            Data Guru
          </h2>
          <a class="mt-6 flex items-center justify-between p-4 mb-8 text-sm font-semibold text-white bg-sp-primary-400 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple"
            href="/daftar-pembayaran/tambah" id="add-payment">
            <div class="flex items-center gap-2">
              <span><?php count($payments); ?> Guru</span>
            </div>
            <span class="flex items-center gap-2">
              <p>Tambah Guru</p>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
              </svg>
            </span>
          </a>

          <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
              <table class="w-full whitespace-no-wrap">
                <thead>
                  <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3 w-2/12">Pembayaran</th>
                    <th class="px-4 py-3 w-2/12">Tanggal Pembayaran</th>
                    <th class="px-4 py-3 w-1/12">Aksi</th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">

                  <?php foreach ($payments as $payment) { ?>
                  <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3">
                      <div class="flex items-center text-sm cursor-pointer">
                        <?php if ($payment['photo'] != "") { ?>
                        <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block text-center">
                          <img class="object-cover w-full h-full rounded-full" src="<?= $payment['photo'] ?>" alt=""
                            loading="lazy" />
                          <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                        </div>
                        <?php } else { ?>
                        <div class="flex items-center justify-center w-8 h-8 mr-3"><svg
                            xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                          </svg>
                        </div>
                        <?php } ?>
                        <div>
                          <p class="font-semibold"><?= 'Pembayaran ID'.$payment['payment_id']  ?></p>
                          <p class="text-xs text-gray-600 dark:text-gray-400">
                          <?php foreach ($students as $student) { ?>
                            <?php  if ($payment['student_id'] == $student['student_id']) {  ?>
                              <?= $student['name']  ?>
                            <?php } ?>
                          <?php } ?>
                          </p>
                        </div>
                      </div>
                    </td>
                    <td class="px-4 py-3 text-sm">
                      <?= $payment['payment_date'] ?>
                    </td>
                    <td class="px-4 py-3 text-sm flex gap-3">
                      <a
                        class="bg-sp-primary-400 px-2 py-1 text-xs font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                        href="/daftar-pembayaran/edit?page=pembayaran&payment_id=<?= $payment['payment_id'] ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                          stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                      </a>
                      <button
                        class="px-2 py-1 text-xs font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red"
                        id="delete-payment" data-id="<?= $payment['payment_id'] ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                          stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                      </button>
                    </td>
                  </tr>

                  <div
                    class="fixed inset-0 z-30 hidden items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"
                    id="modal-delete-payment-<?= $payment['payment_id'] ?>">
                    <div
                      class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
                      role="dialog" id="modal">
                      <header class="flex justify-end">
                        <button
                          class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
                          aria-label="close" id="modal-close-button" data-id="<?= $payment['payment_id'] ?>">
                          <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                            <path
                              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                              clip-rule="evenodd" fill-rule="evenodd"></path>
                          </svg>
                        </button>
                      </header>

                      <div class="mt-4 mb-6">
                        <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-400">
                          Hapus data pembayaran
                        </p>
                        <p class="text-sm text-gray-700 dark:text-gray-400">
                          Apakah Anda ingin menghapus data <?= $payment['name'] ?>?
                        </p>
                      </div>

                      <footer
                        class="flex flex-col items-center justify-end gap-2 sm:flex-row bg-gray-50 dark:bg-gray-800">
                        <button id="modal-close-button" data-id="<?= $payment['payment_id'] ?>"
                          class="w-full px-5 py-3 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 border border-gray-400 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                          Batal
                        </button>

                        <form method="POST" action="">
                          <input type="hidden" name="payment_id" value="<?= $payment['payment_id'] ?>">

                          <button name="delete_payment"
                            class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red m-0">
                            Iya
                          </button>
                        </form>
                      </footer>
                    </div>
                  </div>
                  <?php } ?>

                </tbody>
              </table>
            </div>

          </div>
        </div>
      </main>
    </div>
  </div>

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

  <script type="text/javascript">
    $(document).ready(function () {
      $("body").on('click', "#delete-payment", function (e) {
        var paymentId = $(this).data(("id"));
        $(`#modal-delete-payment-${paymentId}`).removeClass('hidden').addClass('flex');
      });

      $("body").on('click', "#modal-close-button", function (e) {
        var paymentId = $(this).data(("id"));
        $(`#modal-delete-payment-${paymentId}`).removeClass('flex').addClass('hidden');
      });

      $("body").on('click', "#update-payment", function (e) {
        var paymentId = $(this).data("id");
        $(`#modal-update-payment-${paymentId}`).removeClass('hidden').addClass('flex');
      });

      $("body").on('click', "#update-payment-close", function (e) {
        var paymentId = $(this).data("id");
        $(`#modal-update-payment-${paymentId}`).removeClass('flex').addClass('hidden');
      });

      function readURL(target, input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
            target.attr('src', e.target.result);
          }

          reader.readAsDataURL(input.files[0]);
        }
      }

      $("body").on('change', "input[id*='image-place']", function (e) {
        var num = $(this).data("id");

        readURL($(`#image-item-${num}`).children("img"), this);

        $(`#image-item-${num}`).children("#insert-image").html("Ubah Gambar");

        $(`#image-item-${num}`).children("img").css({
          "height": "75px",
          "width": "50%",
          "object-fit": "cover"
        });
      });

      $("body").on("click", "#insert-image", function () {
        var num = $(this).data("id");
        $(`#image-place-${num}`).click();
      });
    });
  </script>
</body>

</html>