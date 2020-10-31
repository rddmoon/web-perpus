

<?php $__env->startSection('title'); ?>
<title>Books List</title>
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

<?php $__env->startSection('search'); ?>
<form class="form-header" action="/book" method="GET">
  <input name="find" class="au-input au-input--xl" type="text" name="search" placeholder="Search for title..." />
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
          <h3 class="title-5 m-b-35">Library Book List</h3>
          <br />
          <div class="table-responsive table-responsive-data2">
            <table class="table table-data2">
              <thead>
                <tr>
                  <th>TITLE</th>
                  <th>AUTHOR</th>
                  <th>CATEGORY</th>
                  <th>ISBN</th>
                  <th>PUBLISHER</th>
                  <th>PUBLICATION YEAR</th>
                  <th>STOCK</th>
                  <th>SHELF</th>
                  <th>ACTION</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $data_book; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr data-toggle="modal" data-target="#exampleModal">
                    <td><?php echo e($book->title); ?></td>
                    <td><?php echo e($book->author->name); ?></td>
                    <td><?php echo e($book->category->name); ?></td>
                    <td><?php echo e($book->ISBN); ?></td>
                    <td><?php echo e($book->publisher->name); ?></td>
                    <td><?php echo e($book->publicationYear); ?></td>
                    <td><?php echo e($book->stock); ?></td>
                    <td><?php echo e($book->shelf->name); ?></td>
                    <td>
                      <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#exampleModal">
                        <i class="zmdi zmdi-plus"></i>Borrow
                      </button>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Book Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/borrow/request/<?php echo e($book->id); ?>" method="POST">
          <?php echo e(csrf_field()); ?>

          <div class="form-group">
            <label for="staticEmail" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
              <input type="text" name="title" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo e($book->title); ?>">
              <input type="hidden" name="book_id" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo e($book->id); ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="staticEmail" class="col-sm-2 col-form-label">Author</label>
            <div class="col-sm-10">
              <input type="text" name="author" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo e($book->author->name); ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="staticEmail" class="col-sm-2 col-form-label">Publisher</label>
            <div class="col-sm-10">
              <input type="text" name="publisher" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo e($book->publisher->name); ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="staticEmail" class="col-sm-2 col-form-label">Publication Year</label>
            <div class="col-sm-10">
              <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo e($book->publicationYear); ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="staticEmail" class="col-sm-2 col-form-label">ISBN</label>
            <div class="col-sm-10">
              <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo e($book->ISBN); ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="staticEmail" class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-10">
              <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo e($book->category->name); ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="staticEmail" class="col-sm-2 col-form-label">Shelf Position</label>
            <div class="col-sm-10">
              <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo e($book->shelf->name); ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="staticEmail" class="col-sm-2 col-form-label">Stock</label>
            <div class="col-sm-10">
              <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo e($book->stock); ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="staticEmail" class="col-sm-2 col-form-label">Requested by:</label>
            <div class="col-sm-10">
              <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo e(auth()->user()->name); ?>">
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <!-- <button type="submit" class="btn btn-secondary" disabled>Request to Borrow</button> -->
          <button type="submit" class="btn btn-primary" <?php echo e(($book->stock) ? "" : "disabled"); ?>>Request to Borrow</button>
        </form>
      </div>
    </div>
  </div>
</div>
</td>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Pemrograman Web\web-perpus\resources\views/book/list.blade.php ENDPATH**/ ?>