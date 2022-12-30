<?php if (isset($component)) { $__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040 = $component; } ?>
<?php $component = App\View\Components\AdminLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AdminLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <?php if(session('status')): ?>
        <div class="alert text-green-600 font-bold text-2xl flex justify-center" data-duration="3000">
            <?php echo e(session('status')); ?></div>
    <?php endif; ?>

    <script src="<?php echo e(asset('assets/js/user.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/show.js')); ?>"></script>

    <div class="py-2">
        <div class="h-full md:h-50 lg:h-50 m-4">
            <div class="bg-white overflow-auto md:overflow-scroll shadow-md sm:rounded-lg">
                <div class="p-6 flex-1 bg-gray-200 border-b">
                    <caption
                        class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                        <h1 class="font-bold" style="font-size: 20px"> Manage Users </h1>
                    </caption>
                    <div class="flex justify-end m-2">
                        <button id="defaultModalButton" data-modal-toggle="defaultModal"
                            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none 
                            focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-3 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            type="button">
                            Create User
                        </button>
                    </div>
                    <form class="flex items-start justify-start p-4 border-b border-gray-300">
                        <input
                            class="form-input w-64 rounded-md shadow-sm focus:outline-none focus:ring-blue-600 focus:border-blue-600"
                            type="text" placeholder="Search...">
                        <button
                            class="btn bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mx-2 rounded-full focus:outline-none focus:shadow-outline">Search</button>
                    </form>
                    <div class="table-responsive text-lg">
                        <table class="table h-full w-full bg-gray-200">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(count($users) > 0): ?>

                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td><?php echo e($users->name); ?></td>
                                            <td><?php echo e($users->email); ?></td>
                                            <td>
                                                <?php if($users->is_admin): ?>
                                                    <span
                                                        class="bg-blue-500 text-white px-2 py-1 rounded-md">Admin</span>
                                                <?php else: ?>
                                                    <span
                                                        class="bg-green-500 text-white px-2 py-1 rounded-md">Officer</span>
                                                <?php endif; ?>
                                            </td>


                                            <td>
                                                <a href="javascript:void(0)" id="show-user"
                                                    data-url="<?php echo e($users->id); ?>"
                                                    class="btn btn-success text-white">Show</a>

                                                <!-- <button class="btn btn-primary edit-btn"
                                                data-toggle="modal" data-target="#editModel">Edit</button>-->

                                                <button type="button" value="<?php echo e($users->id); ?>"
                                                    class="btn bg-blue-500 editbtn btn-md text-white">
                                                    Edit</button>

                                                <form method="POST" action="<?php echo e(url('/admin' . '/' . $users->id)); ?>"
                                                    accept-charset="UTF-8" style="display:inline">
                                                    <?php echo e(method_field('delete')); ?>

                                                    <?php echo e(csrf_field()); ?>

                                                    <button type="submit" class="btn btn-danger bg-red-500"
                                                        title="Delete"
                                                        onclick="return confirm('Are you sure you want delete this Account?')">
                                                        Delete
                                                        Account</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="5" class="text-center">No data Found</td>
                                    </tr>
                                <?php endif; ?>
                              
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
    <!--Show Modal-->
    <div class="modal fade" id="userShowModal" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog block justify-center items-center">
            <div class="modal-content relative p-4 bg-gray-800 rounded-lg shadow dark:bg-gray-800 sm:p-5">
                <div
                    class="modal-header flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                    <h1 class="modal-title text-white" id="exampleModalLabel">Show User</h1>
                    <button type="button" data-bs-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <div class="modal-body text-white grid grid-cols-2">
                    <p><strong>ID:</strong> <span id="users-id"></span></p>
                    <p><strong>Name:</strong> <span id="users-name"></span></p>
                    <p><strong>Email:</strong> <span id="users-email"></span></p>
                    <p><strong>Role:</strong> <span id="users-is_admin"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gray-500 text-white hover:bg-gray-700"
                        data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Create modal -->
    <div id="defaultModal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative p-4 bg-gray-800 rounded-lg shadow dark:bg-gray-800 sm:p-5">
                <!-- Modal header -->
                <div
                    class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Add User
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="defaultModal">
                        <svg aria-hidden="true" class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form action="<?php echo e(url('/admin/users')); ?>" method="post">
                    <?php echo csrf_field(); ?>

                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                        <div>
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                            <input type="text" name="name" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Jane Doe" required title="This field is required">
                        </div>
                        <div>
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="text" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="janedoe@email.com" required title="This field is required">
                        </div>
                        <div>
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="text" name="password" id="password"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="password" required title="This field is required">
                        </div>
                        <div>
                            <label for="is_admin"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                <select name="is_admin" id="is_admin" required title="This field is required"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option>Select category</option>
                                <option value="1">Admin</option>
                                <option value="0">Officer</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit"
                            class="text-white inline-flex items-center justify-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class=" w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Add new user
                        </button>
                </form>
            </div>
        </div>
    </div>
    </div>
    <!--edit Modal-->
    <div class="modal fade" id="editModel" data-bs-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog mt-[15rem] block justify-center items-center" role="document">
            <div class="modal-content relative p-4 bg-gray-800 rounded-lg shadow dark:bg-gray-800 sm:p-5">
                <div
                    class="modal-header flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                    <h1 class="modal-title text-white" id="exampleModalLabel">Edit User</h1>
                    <button type="button" data-bs-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                
                <form action="<?php echo e(url('update-user')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('put'); ?>
                    <!-- Form fields for editing the user go here -->
                    <div class="modal-body grid gap-4 mb-4 sm:grid-cols-2">
                        <div class="form-group text-white">
                            <input type="hidden" name="users_id" id="users_id" />
                            <label for=""
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                            <input type="text"
                                class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="user-name" name="name" required title="This field is required">
                        </div>
                        <div class="form-group text-white mx-2">
                            <label for=""
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="text"
                                class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="user-email" name="email" required title="This field is required">
                        </div>
                        <div>
                            <label for="is_admin"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                            <select id="is_admin" name="is_admin" required title="This field is required"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option>Select category</option>
                                <option value="1">Admin</option>
                                <option value="0">Officer</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gray-500 text-white"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn bg-blue-500 text-white">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- update Modal-->
    <div class="modal fade" id="updateSuccessModal" tabindex="-1" role="dialog"
        aria-labelledby="updateSuccessModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-transparent border-transparent flex justify-center mt-[15rem] w-full"
                data-duration="3000">
                <div class="modal-body flex justify-center items-center text-2xl">
                    <div class="flex flex-col justify-center items-center">
                        <img src="https://cliply.co/wp-content/uploads/2021/03/372103860_CHECK_MARK_400px.gif"
                            alt="Success GIF" width="100" height="100">
                        <span class="text-green-600 text-[40px] font-bold">Update Successfully</span>
                    </div>
                </div>
                <div class="flex justify-center m-4">
                    <button type="button"
                        class="btn bg-gray-500 hover:bg-gray-700 text-white px-2 py-2 font-semibold text-2xl rounded-3xl"
                        data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- delete Modal-->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-transparent border-transparent flex justify-center mt-[15rem] w-full"
                data-duration="3000">
                <div class="modal-body flex justify-center items-center text-2xl">
                    <div class="flex flex-col justify-center items-center">
                        <img src="https://media3.giphy.com/media/3og0IvGtnDyPHCRaYU/giphy.gif" alt="Delete"
                            width="100" height="100">
                        <span class="text-red-600 text-[40px] font-bold">Deleted Successfully</span>
                    </div>
                </div>
                <div class="flex justify-center m-4">
                    <button type="button"
                        class="btn bg-gray-500 hover:bg-gray-700 text-white px-2 py-2 font-semibold text-2xl rounded-3xl"
                        data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add message Modal-->
    <div class="modal fade" id="addSuccessModal" tabindex="-1" role="dialog"
        aria-labelledby="addSuccessModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-transparent border-transparent flex justify-center mt-[15rem] w-full"
                data-duration="3000">
                <div class="modal-body flex justify-center items-center text-2xl">
                    <div class="flex flex-col justify-center items-center">
                        <img src="https://cliply.co/wp-content/uploads/2021/03/372103860_CHECK_MARK_400px.gif"
                            alt="addSuccess" width="100" height="100">
                        <span class="text-green-600 text-[40px] font-bold">Added Successfully</span>
                    </div>
                </div>
                <div class="flex justify-center m-4">
                    <button type="button"
                        class="btn bg-gray-500 hover:bg-gray-700 text-white px-2 py-2 font-semibold text-2xl rounded-3xl"
                        data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function closeSuccessAlert() {
            document.getElementById('success-alert').style.display = 'none';
        }
    </script>
    <script>
        const alert = document.querySelector('.alert');

        if (alert) {
            const duration = alert.getAttribute('data-duration');
            setTimeout(() => {
                alert.style.display = 'none';
            }, duration);
        }
    </script>
    <?php if(Session::has('updateSuccess')): ?>
        <script>
            $('#updateSuccessModal').modal('show');
            $('#updateSuccessModal').modal('hide');
        </script>
        <?php echo e(Session::forget('updateSuccess')); ?>

    <?php endif; ?>

    <?php if(Session::has('Delete')): ?>
        <script>
            $('#deleteModal').modal('show');
            $('#deleteModal').modal('hide');
        </script>
        <?php echo e(Session::forget('Delete')); ?>

    <?php endif; ?>

    <?php if(Session::has('addSuccess')): ?>
        <script>
            $('#addSuccessModal').modal('show');
            $('#addSuccessModal').modal('hide');
        </script>
        <?php echo e(Session::forget('addSuccess')); ?>

    <?php endif; ?>

    <!--<script>
        $('.edit-btn').click(function() {
            var usersId = $(this).data('id');
            $('#editModel').modal('show');
            $('#editForm').attr('action', '/admin/' + $users - > id + '/users');
            $('#editForm').submit(function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    url: '/admin/' + $users - > id + '/users',
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        // handle successful update
                    },
                    error: function(xhr, status, error) {
                        // handle error
                    }
                });
            });
        })
    </script>-->
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040)): ?>
<?php $component = $__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040; ?>
<?php unset($__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\epolice\resources\views/admin/users.blade.php ENDPATH**/ ?>