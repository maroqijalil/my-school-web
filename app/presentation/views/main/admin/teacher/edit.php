<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<?php
$title = "Portal My School | Admin";
include APP . 'presentation/views/components/head.php';
?>

<body>
  <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">

    <?php
    $page = "guru";
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
          <div class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg my-4">
            <div class="mt-4">
              <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-400">
                Edit Data Guru
              </p>

              <form method="POST" action="/" enctype="multipart/form-data">
                <input type="hidden" name="teacher_id" value="<?= $teacher['teacher_id'] ?>">

                <input type="hidden" name="photo_ori" value="<?= $teacher['photo'] ?>">

                <label class="block mt-4 text-sm w-1/2" id="image-item-add">
                  <span class="text-gray-700 dark:text-gray-400" id="image-name">
                    Foto
                  </span>

                  <input id="image-place-add" type="file" name="photo" class="form-control hidden">
                  <img class="mt-1 mb-2" style="height: 200px; width: 50%; object-fit: cover;"
                    id="image-preview-add" src="<?= $teacher['photo'] ?>">

                  <button
                    class="px-2 py-1 text-xs font-medium leading-5 text-white transition-colors duration-150 bg-sp-primary-400 border border-transparent rounded active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                    id="insert-image-add" type="button">
                    Ubah Gambar
                  </button>
                </label>

                <label class="block mt-4 text-sm">
                  <span class="text-gray-700 dark:text-gray-400">
                    NIP
                  </span>
                  <input
                    class="block w-full mt-1 text-sm dark:text-gray-400 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                    name="nip" value="<?= $teacher['nip'] ?>" placeholder="NIP" required />
                </label>

                <label class="block mt-4 text-sm">
                  <span class="text-gray-700 dark:text-gray-400">
                    Nama
                  </span>
                  <input
                    class="block w-full mt-1 text-sm dark:text-gray-400 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                    name="name" value="<?= $teacher['name'] ?>" placeholder="Nama" required />
                </label>

                <label class="block mt-4 text-sm">
                  <span class="text-gray-700 dark:text-gray-400">
                    Degree
                  </span>
                  <input
                    class="block w-full mt-1 text-sm dark:text-gray-400 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                    name="degree" value="<?= $teacher['degree'] ?>" placeholder="Misalnya, S.Pd" required />
                </label>

                <label class="block mt-4 text-sm">
                  <span class="text-gray-700 dark:text-gray-400">
                    Jenis Kelamin
                  </span>
                  <select
                    class="block w-full mt-1 text-sm dark:text-gray-400 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                    name="gender" placeholder="Jenis Kelamin" required value="<?= $teacher['gender'] ?>">
                    <?php 
                    $genders = array(
                      'L' => 'Laki-laki', 
                      'P' => 'Perempuan'
                    );

                    foreach ($genders as $key => $val) {
                        if ($teacher['gender'] == $key) { 
                    ?>
                    <option value="<?= $key ?>" selected><?= $val ?></option>
                    <?php } else { ?>
                    <option value="<?= $key ?>"><?= $val ?></option>
                    <?php
                      }
                    } 
                    ?>
                  </select>
                </label>

                <footer class="flex flex-col items-center justify-end gap-2 sm:flex-row bg-white dark:bg-gray-800 mt-6">
                  <a id="update-teacher-close" type="button" href="/daftar-guru"
                    class="w-full px-5 py-3 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 border border-gray-400 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                    Batal
                  </a>

                  <button type="submit" name="update_teacher"
                    class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-sp-primary-400 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-sp-primary-400 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple m-0">
                    Simpan
                  </button>
                </footer>
              </form>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

  <script type="text/javascript">
    $(document).ready(function () {
      function readURL(target, input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
            target.attr('src', e.target.result);
          }

          reader.readAsDataURL(input.files[0]);
        }
      }

      $("body").on('change', "input[id='image-place-add']", function (e) {
        readURL($("#image-item-add").children("img"), this);

        $("#image-item-add").children("#insert-image-add").html("Ubah Gambar");

        $("#image-item-add").children("img").css({
          "height": "200px",
          "width": "50%",
          "object-fit": "cover"
        });
      });

      $("body").on("click", "#insert-image-add", function () {
        $("#image-place-add").click();
      });
    });
  </script>
</body>

</html>
