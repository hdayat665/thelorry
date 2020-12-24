<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="<?= base_url('assets/jquery.min.js')?>"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://use.fontawesome.com/286383e63b.js"></script>
  <link rel="stylesheet" href="<?= base_url('/assets/dashboard.css') ?>">
  <link rel="stylesheet" href="<?= base_url('/assets/offcanvas.css') ?>">

  <title>TheLorry</title>

  <style type="text/css">
    .limit{
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;   
            -webkit-box-orient: vertical;
        }
  </style>
</head>
<body>
  <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">TheLorry Aricle</a>
    <div class="form-control form-control-dark w-100">Welcome <?= $this->session->userdata['name'] ?></div>
    <!-- <input class="form-control form-control-dark w-100" type="text" value=" > -->
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <a class="nav-link" href="<?= base_url('Admin/logout') ?>"><span class="fa fa-sign-out"></span> Sign out</a>
      </li>
    </ul>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="#">
                <span class="fa fa-bars"></span>
                Menu <span class="sr-only"></span>
              </a>
            </li>

            <?php if ($this->session->userdata['role'] != 1): ?>
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/user_view') ?>">
                  <span class="fa fa-book"></span>
                  Article
                </a>
              </li>
              <?php else: ?>

                <li class="nav-item">
                  <a class="nav-link" href="<?= base_url('admin/user_view') ?>">
                    <span class="fa fa-book"></span>
                    Article
                  </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="<?= base_url('admin/user_list_view') ?>">
                    <span class="fa fa-users"></span>
                    User Management
                  </a>
                </li>
              <?php endif ?>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <?= $content; ?>
        </main>
      </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
  </html>