

<?php $__env->startSection('title'); ?>
<title>Edit Books</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('bar'); ?>
<!-- HEADER MOBILE-->
<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a class="logo" href="/">
                    <h2>LIBRARY</h2>
                </a>

                <button class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
                <li>
                    <a href="/book">
                      <i class="fas fa-group"></i>Books List</a>
                </li>
                <li>
                    <a href="#">
                      <i class="fas fa-group"></i>Borrow Request</a>
                </li>
                <li>
                    <a href="/member">
                      <i class="fas fa-group"></i>Members List</a>
                </li>
                <li>
                    <a href="/staff-profile/<?php echo e(auth()->user()->id); ?>">
                      <i class="fas fa-user"></i>My Profile</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- END HEADER MOBILE-->

<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="/">
            <h1>LIBRARY</h1>
        </a>
        <p><br />Area 51</p>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
              <li>
                  <a href="/book">
                    <i class="fas fa-book"></i>Books List</a>
              </li>
              <li>
                  <a href="/borrow">
                    <i class="fas fa-tasks"></i>Borrows List</a>
              </li>
              <!-- <li>
                  <a href="#">
                    <i class="fas fa-exclamation-circle"></i>Borrows Overdue</a>
              </li> -->
              <li>
                  <a href="/borrow/waiting">
                    <i class="fas fa-comment"></i>Borrow Request</a>
              </li>
              <!-- <li>
                  <a href="#">
                    <i class="fas fa-check-square"></i>Returned Today</a>
              </li> -->
              <li>
                  <a href="/member">
                    <i class="fas fa-group"></i>Members List</a>
              </li>
              <li>
                  <a href="/staff-profile/<?php echo e(auth()->user()->id); ?>">
                    <i class="fas fa-user"></i>My Profile</a>
              </li>
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="main-content">
  <div class="section__content section__content--p30">
    <div class="container-fluid">
      <h1>Edit Book Details</h1>
      <?php if(session('success')): ?>
      <div class="alert alert-success" role="alert">
        <?php echo e(session('success')); ?>

      </div>
      <?php endif; ?>
      <div class="row">
        <div class="col-lg-12">
          <form action="/book/<?php echo e($book->id); ?>/update" method="POST">
            <?php echo e(csrf_field()); ?>

            <div class="form-group">
              <label for="exampleInputPassword1">Title</label>
              <input name="title" type="text" class="form-control" placeholder="Title" value="<?php echo e($book->title); ?>">
            </div>
            <div class="form-group">
            <label for="author_id">Author</label>
                <select id="author_id" name="author_id" class="form-control select2" value="<?php echo e($book->author_id); ?>">
                <!-- <option value="N/A">--SELECT--</option> -->
                  <?php $__currentLoopData = \App\Models\Author::get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($author->id); ?>"><?php echo e($author->name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="form-group">
            <label for="category_id">Category</label>
                <select id="category_id" name="category_id" class="form-control select2" value="<?php echo e($book->category_id); ?>">
                <!-- <option value="N/A">--SELECT--</option> -->
                  <?php $__currentLoopData = \App\Models\Category::get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">ISBN</label>
              <input name="ISBN" type="text" class="form-control" value="<?php echo e($book->ISBN); ?>">
            </div>
            <div class="form-group">
            <label for="publisher_id">Publisher</label>
                <select id="publisher_id" name="publisher_id" class="form-control select2" value="<?php echo e($book->publisher_id); ?>">
                <!-- <option value="N/A">--SELECT--</option> -->
                  <?php $__currentLoopData = \App\Models\Publisher::get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $publisher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($publisher->id); ?>"><?php echo e($publisher->name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Publication Year</label>
              <input name="publicationYear"type="text" class="form-control" placeholder="YYYY-MM-DD" value="<?php echo e($book->publicationYear); ?>">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Stock</label>
              <input name="stock"type="text" class="form-control" value="<?php echo e($book->stock); ?>">
            </div>
            <div class="form-group">
            <label for="shelf_id">Shelf</label>
                <select id="shelf_id" name="shelf_id" class="form-control select2" value="<?php echo e($book->shelf_id); ?>">
                <!-- <option value="N/A">--SELECT--</option> -->
                  <?php $__currentLoopData = \App\Models\Shelf::get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shelf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($shelf->id); ?>"><?php echo e($shelf->name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-warning">Edit</button>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Pemrograman Web\web-perpus\resources\views/book/edit.blade.php ENDPATH**/ ?>