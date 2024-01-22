<?php
$title = "Add User";
ob_start();
?>

<body class="bg-gray-100">
<section class="bg-white dark:bg-gray-900">
    <div class="max-w-2xl px-4 py-8 mx-auto lg:py-16">
      <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add User</h2>
        <form action="index.php?action=addUser" method="post">
          <div class="grid gap-4 mb-4 sm:grid-cols-2 sm:gap-6 sm:mb-5">
              <div class="sm:col-span-2">
                  <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">User Name</label>
                  <input type="text" name="username" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
              </div>
              <div class="w-full">
                  <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                  <input type="text" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"  required>
              </div>
              <div class="w-full">
                  <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                  <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"  required>
              </div>
              <div>
                  <label for="isActive" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Is Active</label>
                  <select name="isActive" id="isActive" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                    <option value="<?= 1 ?>">
                        Oui
                    </option>
                    <option value="<?= 0 ?>">
                        Non
                    </option>
                  </select>
              </div>
              <div>
              <div>
                  <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                  <select name="role" id="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                    <option value="<?= 'Client' ?>">
                        Client
                    </option>
                    <option value="<?= 'Operator' ?>">
                        Operator
                    </option>
                    <option value="<?= 'Admin' ?>">
                        Admin
                    </option>
                  </select>
              </div>
              <div>
                  <label for="companyID" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Companies</label>
                  <select name="companyID" id="companyID" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                      <option value="<?= 'NULL' ?>">
                          Null
                      </option>
                    <?php foreach($companyDATA as $company){?>  
                        <option value="<?= $company->getCompanyID() ?>">
                            <?= $company->getCompanyName() ?>
                        </option>
                    <?php }?>  
                  </select>
              </div>

              
            </div>
            <div class="flex items-center space-x-4">
                <a href=""><button type="submit" class="text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                    Submit
                </button></a>
            </div>
        </form>
    </div>
</section>

</body>
</html>
<?php
$content = ob_get_clean();
?>
<?php include_once 'app/views/include/layout.php'; ?>
