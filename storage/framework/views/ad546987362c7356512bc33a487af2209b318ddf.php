

<?php $__env->startSection('title'); ?>
<title>Staff List</title>
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
                    <a href="/staff">
                      <i class="fas fa-group"></i>Staff List</a>
                </li>
                <li>
                    <a href="/admin-profile/<?php echo e(auth()->user()->id); ?>">
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
                  <a href="/staff">
                    <i class="fas fa-group"></i>Staff List</a>
              </li>
              <li>
                  <a href="/admin-profile/<?php echo e(auth()->user()->id); ?>">
                    <i class="fas fa-user"></i>My Profile</a>
              </li>
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('search'); ?>
<form class="form-header" action="/staff" method="GET">
  <input name="find" class="au-input au-input--xl" type="text" name="search" placeholder="Search for names..." />
  <button class="au-btn--submit" type="submit">
      <i class="zmdi zmdi-search"></i>
  </button>
</form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="main-content">
  <div class="section__content section__content--p30">
    <div class="container-fluid">
      <?php if(session('success')): ?>
      <div class="alert alert-success" role="alert">
        <?php echo e(session('success')); ?>

      </div>
      <?php endif; ?>
      <div class="row">
        <div class="col-md-12">
          <h3 class="title-5 m-b-35">Library Staff List</h3>
          <div class="table-data__tool-right">
            <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#exampleModal">
              <i class="zmdi zmdi-plus"></i>Add New Staff
            </button>
          </div>
          <br />
          <div class="table-responsive table-responsive-data2">
            <table class="table table-data2">
              <thead>
                <tr>
                  <th>NAME</th>
                  <th>ADDRESS</th>
                  <th>PHONE</th>
                  <th>EMAIL</th>
                  <th>DATE OF BIRTH</th>
                  <th>IDENTITY NUMBER</th>
                  <th>ACTION</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $data_staff; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $staff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($staff->name); ?></td>
                    <td><?php echo e($staff->address); ?></td>
                    <td><?php echo e($staff->phone); ?></td>
                    <td><?php echo e($staff->email); ?></td>
                    <td><?php echo e($staff->birth); ?></td>
                    <td><?php echo e($staff->idNumber); ?></td>
                    <td>
                      <a href="/staff/<?php echo e($staff->id); ?>/edit" class="btn btn-warning" type="button">Edit</a>
                      <a href="/staff/<?php echo e($staff->id); ?>/delete" class="btn btn-danger" type="button" onclick="return confirm('Are you sure you want to permanently delete this staff details?')">Delete</a>
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
<!-- modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Staff Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/staff/create" method="POST">
          <?php echo e(csrf_field()); ?>

          <div class="form-group">
            <label for="exampleInputPassword1">Name</label>
            <input name="name" type="text" class="form-control" placeholder="Name">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Email address</label>
            <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Phone</label>
            <input name="phone"type="text" class="form-control" placeholder="08xxxxxxxxxx">
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Address</label>
            <textarea name="address" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Date of Birth</label>
            <input name="birth" type="text" class="form-control" placeholder="YYYY-MM-DD">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Identity Number</label>
            <input name="idNumber" type="text" class="form-control">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Add</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Pemrograman Web\web-perpus\resources\views/staff/index.blade.php ENDPATH**/ ?>