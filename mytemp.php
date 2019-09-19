<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<style>
    .ml-auto {
        left: auto !important;
        right: 0px;
    }

    .mr-auto {
        right: auto !important;
        left: 0px;
    }

    .boxandshadow {
        border-radius: 0px 0px 10px 10px;
        box-shadow: 1px 1px 50px 1px;
        /*margin-left: 2px;*/
    }

    .box {
        /*border-radius: 0px 0px 10px 10px;*/
        padding: 87px;
        /*text-shadow: 50px 0px 7px ;*/

    }

    @media (max-width: 400px) {
        .box {
            /*display: none;*/
            /*border-radius: 0px 0px 10px 10px;*/
            padding: 40px;
        }

    }
</style>
<body>


<header>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top boxandshadow">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            Menu<span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="nav nav-pills navbar-nav mr-auto">

                <li class="nav-item"><a class="nav-link active bg-success" href="#">Profile</a></li>
                <li class="nav-item"><a class="nav-link text-warning" href="#">Massage manager</a></li>
                <li class="nav-item"><a class="nav-link text-success" href="#">Broadcast</a></li>
                <li class="nav-item"><a class="nav-link text-Secondary" href="#">Information</a></li>

            </ul>
            <ul class="nav ml-auto navbar-nav">
                <li class="nav-item">
                    <img src="https://profile.line-scdn.net/0hFVmNQN-UGXlQNzMgfUlmLmxyFxQnGR8xKAIBGHxlRxsvAwt9ZAVTSiFiE0wpVVx6agJRGCZiE05-"
                         style="width: 40px;height: 40px;border-radius: 10px 10px 10px 10px; ">
                </li>
                <li class="dropdown">
                    <a class="text-success dropdown-toggle nav-link" data-toggle="dropdown" href="#">
                        LINE <img
                                src="lineIcon.png"
                                style="width: 20px;height: 20px;border-radius: 10px 10px 10px 10px; ">
                        <span
                                class="caret"></span></a>
                    <ul class="dropdown-menu bg-dark">
                        <li class="nav-item"><a class="nav-link text-primary" href="#">FACEBOOK
                                <img src="FBIcon.png"
                                     style="float: right;width: 20px;height: 20px;border-radius: 10px 10px 10px 10px; "></a>
                        </li>
                        <li class="nav-item"><a class="nav-link text-info" href="#">TWITTER
                                <img src="twitterIcon.png"
                                     style="float: right;width: 20px;height: 20px;border-radius: 10px 10px 10px 10px; "></a>
                            </a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-danger" href="#">logout <img
                                src="logout.png"
                                style="width: 20px;height: 20px;"></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<div class="col-md-12 jumbotron jumbotron-fluid box text-success" style="margin-top: 50px;">
    <!--            <div class="jumbotron jumbotron-fluid">-->
    <div style="font-size: 32px">
        <div><span style="color:#447294;">P</span><span style="color:#5d8bac;">r</span><span
                    style="color:#76a3c3;">o</span><span style="color:#8fbcdb;">f</span><span
                    style="color:#b1c5d1;">i</span><span style="color:#d2cdc6;">l</span><span
                    style="color:#f4d6bc;">e</span></div>
    </div>
    <!--            </div>-->
</div>
<div class="container-fluid">
    <div class="">


        <div style="font-size: 16px">
            <div class="row">
                <div class="col-md-4">

                    <h1>aa row1</h1>
                    <div class="card">
                        <div class="card-body ">Basic card</div>
                    </div>
                </div>

                <div class="col-md-4 ">
                    <h1>bb row1</h1>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat.</p>
                </div>
                <div class="col-md-4 ">
                    <h1>cc row1</h1>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                        totam
                        rem aperiam.</p>
                </div>
                <div class="col-md-8">

                    <h1>aa</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore
                        et
                        dolore magna aliqua.</p>
                </div>
                <div class="col-md-4">
                    <h1>bb</h1>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat.</p>
                </div>
                <div class="col-md-4">
                    <h1>cc</h1>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                        totam
                        rem aperiam.</p>
                </div>
                <div class="col-md-8">

                    <h1>aa</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore
                        et
                        dolore magna aliqua.</p>
                </div>
                <div class="col-md-12">
                    <h1>bb</h1>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat.</p>
                </div>
                <div class="col-md-4">
                    <h1>cc</h1>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                        totam
                        rem aperiam.</p>
                </div>
                <div class="col-md-4">

                    <h1>aa</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore
                        et
                        dolore magna aliqua.</p>
                </div>
                <div class="col-md-4">
                    <h1>bb</h1>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat.</p>
                </div>
                <div class="col-md-4">
                    <h1>cc</h1>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                        totam
                        rem aperiam.</p>
                </div>
                <div class="col-md-4">

                    <h1>aa</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore
                        et
                        dolore magna aliqua.</p>
                </div>
                <div class="col-md-4">
                    <h1>bb</h1>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat.</p>
                </div>
                <div class="col-md-4">
                    <h1>cc</h1>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                        totam
                        rem aperiam.</p>
                </div>
                <div class="col-md-4">

                    <h1>aa</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore
                        et
                        dolore magna aliqua.</p>
                </div>
                <div class="col-md-4">
                    <h1>bb</h1>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat.</p>
                </div>
                <div class="col-md-4">
                    <h1>cc</h1>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                        totam
                        rem aperiam.</p>
                </div>
                <div class="col-md-4">

                    <h1>aa</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore
                        et
                        dolore magna aliqua.</p>
                </div>
                <div class="col-md-4">
                    <h1>bb</h1>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat.</p>
                </div>
                <div class="col-md-4">
                    <h1>cc</h1>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                        totam
                        rem aperiam.</p>
                </div>
                <div class="col-md-4">

                    <h1>aa</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore
                        et
                        dolore magna aliqua.</p>
                </div>
                <div class="col-md-4">
                    <h1>bb</h1>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat.</p>
                </div>
                <div class="col-md-4">
                    <h1>cc</h1>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                        totam
                        rem aperiam.</p>
                </div>
                <div class="col-md-4">

                    <h1>aa</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore
                        et
                        dolore magna aliqua.</p>
                </div>
                <div class="col-md-4">
                    <h1>bb</h1>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat.</p>
                </div>
                <div class="col-md-4">
                    <h1>cc</h1>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                        totam
                        rem aperiam.</p>
                </div>
                <div class="col-md-4">

                    <h1>aa</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore
                        et
                        dolore magna aliqua.</p>
                </div>
                <div class="col-md-4">
                    <h1>bb</h1>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat.</p>
                </div>
                <div class="col-md-4">
                    <h1>cc</h1>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                        totam
                        rem aperiam.</p>
                </div>
                <div class="col-md-4">

                    <h1>aa</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore
                        et
                        dolore magna aliqua.</p>
                </div>
                <div class="col-md-4">
                    <h1>bb</h1>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat.</p>
                </div>
                <div class="col-md-4">
                    <h1>cc</h1>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                        totam
                        rem aperiam.</p>
                </div>

            </div>
        </div>

        <div class="clearfix visible-lg"></div>
    </div>
</div>

</body>
</html>
