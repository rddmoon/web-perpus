

<?php $__env->startSection('title'); ?>
<title>My Book Requests</title>
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
                    <a href="/books">
                      <i class="fas fa-book"></i>Books List</a>
                </li>
                <li>
                    <a href="/borrow/request">
                      <i class="fas fa-comment"></i>Borrow Request</a>
                </li>
                <li>
                    <a href="#">
                      <i class="fas fa-comment"></i>Borows Status</a>
                </li>
                <li>
                    <a href="/member-profile/<?php echo e(auth()->user()->id); ?>">
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
                  <a href="/books">
                    <i class="fas fa-group"></i>Books List</a>
              </li>
              <li>
                  <a href="/borrow/request">
                    <i class="fas fa-group"></i>Borrow Request</a>
              </li>
              <li>
                  <a href="/member-profile/<?php echo e(auth()->user()->id); ?>">
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
      <div class="row">
        <div class="col-md-12">
          <h3 class="title-5 m-b-35">Borrow Requests List</h3>
          <br />
          <div class="table-responsive table-responsive-data2">
            <table class="table table-data2">
              <thead>
                <tr>
                  <th>DATE REQUESTED</th>
                  <th>BOOK</th>
                  <th>STATUS</th>
                  <th>ACTION</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $data_borrow; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $borrow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($borrow->borrowDate); ?></td>
                    <td><?php echo e($borrow->book->title); ?></td>
                    <td><?php echo e($borrow->status); ?></td>
                    <td>
                      <a href="/borrow/<?php echo e($borrow->id); ?>/delete" class="btn btn-danger" type="button" onclick="return confirm('Are you sure you want to permanently delete this request?')">Delete</a>
                    </td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Pemrograman Web\web-perpus\resources\views/member/myRequest.blade.php ENDPATH**/ ?>