<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <style>
    .banner {
      background: #fff;
      font-family: Lato, sans-serif;
    }

    .navbar-nav-primary {
      text-transform: uppercase;
    }

    .navbar-form-search {
      position: relative;

      .form-control {
        width: 250px;
      }

      .btn {
        border: 0;
        background: transparent;
        font-size: 18px;

        &:active,
        &:hover,
        &:focus {
          color: #000;
          outline: none;
          box-shadow: none;
        }
      }

      .search-form-container {
        text-align: right;
        position: absolute;
        width: 300px;
        overflow: hidden;
        background: #fff;
        right: 60px;
        top: 0;
        z-index: 9;
        transition: all .3s ease-in-out;

        &.hdn {
          width: 0;
        }

        .search-input-group {
          width: 300px;
        }
      }
    }

    @import url(https://fonts.googleapis.com/css?family=Roboto:400,100,900);

    html,
    body {
      -moz-box-sizing: border-box;
      box-sizing: border-box;
      height: 100%;
      width: 100%;
      background: #FFF;
      font-family: 'Roboto', sans-serif;
      font-weight: 400;
    }

    .wrapper {
      display: table;
      height: 100%;
      width: 100%;
    }

    .container-fostrap {
      display: table-cell;
      padding: 1em;
      text-align: center;
      vertical-align: middle;
    }

    .fostrap-logo {
      width: 100px;
      margin-bottom: 15px
    }

    h1.heading {
      color: #fff;
      font-size: 1.15em;
      font-weight: 900;
      margin: 0 0 0.5em;
      color: #505050;
    }

    @media (min-width: 450px) {
      h1.heading {
        font-size: 3.55em;
      }
    }

    @media (min-width: 760px) {
      h1.heading {
        font-size: 3.05em;
      }
    }

    @media (min-width: 900px) {
      h1.heading {
        font-size: 3.25em;
        margin: 0 0 0.3em;
      }
    }

    .card {
      display: block;
      margin-bottom: 20px;
      line-height: 1.42857143;
      background-color: #fff;
      border-radius: 2px;
      box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
      transition: box-shadow .25s;
    }

    .card:hover {
      box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .img-card {
      width: 100%;
      height: 200px;
      border-top-left-radius: 2px;
      border-top-right-radius: 2px;
      display: block;
      overflow: hidden;
    }

    .img-card img {
      width: 100%;
      height: 200px;
      object-fit: cover;
      transition: all .25s ease;
    }

    .card-content {
      padding: 15px;
      text-align: left;
    }

    .card-title {
      margin-top: 0px;
      font-weight: 700;
      font-size: 1.65em;
    }

    .card-title a {
      color: #000;
      text-decoration: none !important;
    }

    .card-read-more {
      border-top: 1px solid #D4D4D4;
    }

    .card-read-more a {
      text-decoration: none !important;
      padding: 10px;
      font-weight: 600;
      text-transform: uppercase
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-default banner">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
          data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">My Blog</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right navbar-nav-primary">
          <li><a href="#">Home</a></li>
          <li><a href="/add-post">Add Post</a></li>

          <li> <a href="{{ URL('/show-post/'.session('id'))}}">Show</a></li>

        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>


</body>

</html>