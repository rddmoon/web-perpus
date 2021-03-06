

<?php $__env->startSection('title'); ?>
<title>Edit Member</title>
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
      <h1>Edit Member Details</h1>
      <?php if(session('success')): ?>
      <div class="alert alert-success" role="alert">
        <?php echo e(session('success')); ?>

      </div>
      <?php endif; ?>
      <div class="row">
        <div class="col-lg-12">
          <form action="/member/<?php echo e($member->id); ?>/update" method="POST">
            <?php echo e(csrf_field()); ?>

            <div class="form-group">
              <label for="exampleInputPassword1">Name</label>
              <input name="name" type="text" class="form-control" placeholder="Name" value="<?php echo e($member->name); ?>">
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Address</label>
              <textarea name="address" class="form-control" id="exampleFormControlTextarea1" rows="3"><?php echo e($member->address); ?></textarea>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Phone</label>
              <input name="phone" type="text" class="form-control" placeholder="08xxxxxxxxxxxx" value="<?php echo e($member->phone); ?>">
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Email Address</label>
              <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="<?php echo e($member->email); ?>">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Date of Birth</label>
              <input name="birth"type="text" class="form-control" placeholder="YYYY-MM-DD" value="<?php echo e($member->birth); ?>">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Identity Number</label>
              <input name="idNumber"type="text" class="form-control" value="<?php echo e($member->idNumber); ?>">
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Pemrograman Web\web-perpus\resources\views/member/edit.blade.php ENDPATH**/ ?>