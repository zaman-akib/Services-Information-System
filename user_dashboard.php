<?php
include('security.php');
include('includes/user_header.php'); 
include('includes/user_navbar.php'); 
?>

<div class="container-fluid">
    <marquee behavior="scroll" direction="right">Welcome</marquee>
    <?php
        if(isset($_SESSION['email'])){
            $email = $_SESSION['email'];
            $query = "SELECT * FROM users WHERE email='$email'";
            $query_run = mysqli_query($connection, $query);
            $user = mysqli_fetch_assoc($query_run);
        }
    ?>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <main>
        <div class="container-fluid">
            <?php
                if($user['sector'] == 'Army'){
                    echo "<h2>Welcome to Bangladesh Military</h2>";
                }
                elseif($user['sector'] == 'Navy'){
                    echo "<h2>Welcome to Bangladesh Navy</h2>";
                }
                if($user['sector'] == 'Air Force'){
                    echo "<h2>Welcome to Bangladesh Air Force</h2>";
                }
            ?>    
        </div>
    </main>
    </div>

        <?php
        if($user['sector'] == 'Army'){ 
        ?>
            <div id="army_recent_works" class="carousel slide" data-ride="carousel">
            <ul class="carousel-indicators">
                <li data-target="#army_recent_works" data-slide-to="0" class="active"></li>
                <li data-target="#army_recent_works" data-slide-to="1"></li>
                <li data-target="#army_recent_works" data-slide-to="2"></li>
                <li data-target="#army_recent_works" data-slide-to="3"></li>
                <li data-target="#army_recent_works" data-slide-to="4"></li>
            </ul>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="images/army_1.jpg" alt="Army Recent Works 1" width="1100" height="500">
                <div class="carousel-caption">
                    <h3>Bangladesh Army</h3>
                    <p>Covid-19 Camp</p>
                </div>   
                </div>
                <div class="carousel-item">
                <img src="images/army_2.jpg" alt="Army Recent Works 2" width="1100" height="500">
                <div class="carousel-caption">
                    <h3>Bangladesh Army</h3>
                    <p>Fighting Covid-19</p>
                </div>   
                </div>
                <div class="carousel-item">
                <img src="images/army_3.jpg" alt="Army Recent Works 3" width="1100" height="500">
                <div class="carousel-caption">
                    <h3>Bangladesh Army</h3>
                    <p>Distribuiting Relief in Covid-19 Pandemic</p>
                </div>   
                </div>
                <div class="carousel-item">
                <img src="images/army_4.jpg" alt="Army Recent Works 4" width="1100" height="500">
                <div class="carousel-caption">
                    <h3>Bangladesh Army</h3>
                    <p>Chief of Army Staff with the visiting 05 members of Russian Navy</p>
                </div>   
                </div>
                <div class="carousel-item">
                <img src="images/army_5.jpg" alt="Army Recent Works 5" width="1100" height="500">
                <div class="carousel-caption">
                    <h3>Bangladesh Army</h3>
                    <p>PM visting in Winter Training</p>
                </div>   
                </div>
            </div>
            <a class="carousel-control-prev" href="#army_recent_works" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#army_recent_works" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>

        <?php 
        }

        elseif($user['sector'] == 'Navy'){ ?>
            <div id="navy_recent_works" class="carousel slide" data-ride="carousel">
            <ul class="carousel-indicators">
                <li data-target="#navy_recent_works" data-slide-to="0" class="active"></li>
                <li data-target="#navy_recent_works" data-slide-to="1"></li>
                <li data-target="#navy_recent_works" data-slide-to="2"></li>
            </ul>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="images/navy_1.jpg" alt="Navy Recent Works 1" width="1100" height="500">
                <div class="carousel-caption">
                    <h3>Bangladesh Navy</h3>
                </div>   
                </div>
                <div class="carousel-item">
                <img src="images/navy_2.jpg" alt="Navy Recent Works 2" width="1100" height="500">
                <div class="carousel-caption">
                    <h3>Bangladesh Navy</h3>
                </div>   
                </div>
                <div class="carousel-item">
                <img src="images/navy_3.jpg" alt="Navy Recent Works 3" width="1100" height="500">
                <div class="carousel-caption">
                    <h3>Bangladesh Navy</h3>
                </div>   
                </div>
            </div>
            <a class="carousel-control-prev" href="#navy_recent_works" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#navy_recent_works" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
        <?php 
        }

        elseif($user['sector'] == 'Air Force'){ ?>
            <div id="navy_recent_works" class="carousel slide" data-ride="carousel">
            <ul class="carousel-indicators">
                <li data-target="#navy_recent_works" data-slide-to="0" class="active"></li>
                <li data-target="#navy_recent_works" data-slide-to="1"></li>
                <li data-target="#navy_recent_works" data-slide-to="2"></li>
            </ul>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="images/baf_1.png" alt="Air Force Recent Works 1" width="1100" height="500">
                <div class="carousel-caption">
                    <h3>Bangladesh Air Force</h3>
                </div>   
                </div>
                <div class="carousel-item">
                <img src="images/baf_2.jpg" alt="Air Force Recent Works 2" width="1100" height="500">
                <div class="carousel-caption">
                    <h3>Bangladesh Air Force</h3>
                </div>   
                </div>
                <div class="carousel-item">
                <img src="images/baf_3.jpg" alt="Air Force Recent Works 3" width="1100" height="500">
                <div class="carousel-caption">
                    <h3>Bangladesh Air Force</h3>
                </div>   
                </div>
            </div>
            <a class="carousel-control-prev" href="#navy_recent_works" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#navy_recent_works" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
        <?php } ?>
</div>
<!-- /.container-fluid -->
<br> <br>

<br><br>
<div>
<h2 style="text-align:center;">About Us</h2>
<p style="text-align:center;">The Bangladesh Armed Forces consists of the three uniformed military services of Bangladesh: the Bangladesh Army, the Bangladesh Navy and the Bangladesh Air Force.
Any solutions arise from the problems we faced. In our daily life, we faced some communition or information problem. For that reason we thought to formulate something that will be helpful for solving that faced problems. And this combined website (Bangladesh Army, Bangladesh Navy, Bangladesg Air force) is a prototype of that vision.
We tried to keep here the central announcement systems that will be helpful for our easy communication.
Again, many information previously we needed to know in varities of ways. But here we'll be able to get that information easily. Also there is some user levels for our comfortable management.</p>
</div>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>