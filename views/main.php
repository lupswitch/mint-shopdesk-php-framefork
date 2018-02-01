<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mint ~ <?php echo $title; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="<?php echo sd_asset_url('assets/js/main.js') ?>"></script>
    <link rel="stylesheet" href="<?php echo sd_asset_url('assets/css/main.css') ?>">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Mint Framework</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#basic">Basic</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#functions">Functions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#controllers">Controllers</a>
                </li>
                <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li> -->
            </ul>
        </div>
    </nav>
    <div class="container body-main">
        <h3>Documentation</h3>
        <hr>
        <div class="sd-card" id="#basic">
            <h5>Basic</h5>
            <tt>/index.php/{{controller}}/{{method}}/{{params}}</tt>
            <br>
            <br>
            <table class="table table-striped">
                <tr>
                    <th>Variable</th>
                    <th>Description</th>
                </tr>
                <tr>
                    <td><tt>APPPATH</tt></td>
                    <td>Returns current working directory</td>
                </tr>
            </table>
        </div>
        <div class="sd-card" id="#functions">
            <h5>Functions</h5>
            <table class="table table-striped">
                <tr>
                    <th>Function</th>
                    <th>Description</th>
                </tr>
                <tr>
                    <td><tt>sd_base_url($str)</tt></td>
                    <td>Returns base url of the app with index.php</td>
                </tr>
                <tr>
                    <td><tt>sd_asset_url($str)</tt></td>
                    <td>Returns base url of the app without index.php</td>
                </tr>
                <tr>
                    <td><tt>require_auth()</tt></td>
                    <td>Adds a basic auth.</td>
                </tr>
                <tr>
                    <td><tt>sd_hash($str)</tt></td>
                    <td>Returns the string with sha1 hash</td>
                </tr>
                <tr>
                    <td><tt>sd_redirect($str)</tt></td>
                    <td>Redirects the user to the given link</td>
                </tr>
                <tr>
                    <td><tt>addslashes_rec($str = var|array)</tt></td>
                    <td>Filter the given variable or array for database ops</td>
                </tr>
                <tr>
                    <td><tt>sd_headers()</tt></td>
                    <td>Returns requsted headers</td>
                </tr>
                
            </table>
        </div>
        <div class="sd-card" id="#controllers">
            <h5>Controller</h5>
            <table class="table table-striped">
                <tr>
                    <th>Function</th>
                    <th>Description</th>
                </tr>
                <tr>
                    <td><tt>$this->json($array=[])</tt></td>
                    <td>Sets Content-Type to application/json and returns JSON data</td>
                </tr>
                <tr>
                    <td><tt>$this->view($viewname, $data=[])</tt></td>
                    <td>Renders the view of given filename in views folder</td>
                </tr>
                <tr>
                    <td><tt>$this->model($modelname)</tt></td>
                    <td>Loads and return a modal from the model directory</td>
                </tr>
                <tr>
                    <td><tt>$this->input_post($key)</tt></td>
                    <td>Returns a POST value of key and filters it</td>
                </tr>
                <tr>
                    <td><tt>$this->input_get($key)</tt></td>
                    <td>Returns a GET value of key and filters it</td>
                </tr>
                <tr>
                    <td><tt>$this->db_query($query)</tt></td>
                    <td>Runs a db query and return the results</td>
                </tr>
                
                
                
            </table>
        </div>
    </div>
    <hr>
</body>
</html>