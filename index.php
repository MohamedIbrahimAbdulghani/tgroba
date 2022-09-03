<?php

include_once "lib/select.php";

$countries = selectData();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $from_country = $_POST["from_country"];
    $to_country = $_POST["to_country"];
    $post1 = $_POST["post1"];
    $post2 = $_POST["post2"];
    $personal = $_POST["personal"];



    if(!empty($post1) && !empty($post2) &&  !empty($from_country) && !empty($to_country)) {
        addPost($post1, $post2);
        addCountry($from_country, $to_country);
        $count = selectCountry($from_country, $to_country);
    };

   
}
 if(!empty($_POST["first_name"])) {
            $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email1 = $_POST["email1"];
    $email2 = $_POST["email2"];
    $address1 = $_POST["address1"];
    $address2 = $_POST["address2"];
    $phone1 = $_POST["phone1"];
    $phone2 = $_POST["phone2"];
    $company1 = $_POST["company1"];
    $company2 = $_POST["company2"];
        addNewUser($first_name, $last_name, $email1, $email2, $address1, $address2, $phone1, $phone2, $company1, $company2);
    }

    if(!empty($_POST["weight"])) {
        $weight = $_POST["weight"];
        $length = $_POST["length"];
        $width = $_POST["width"];
        $height = $_POST["height"];

        $dim = selectDimensions($weight, $length, $width, $height);
    }

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="assets/css/tgroba.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="assets/js/tgroba.js"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-9 col-sm-9 col-md-9 col-lg-9 col-xl-9 text-center p-0 ">
                <div class="card">

                    <form id="msform" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
                        <!-- progressbar -->
                        <ul id="progressbar">
                            <li class="active" id="account"><strong>shipment details</strong></li>
                            <li id="personal"><strong>choose a service</strong></li>
                            <li id="payment"><strong>address data</strong></li>
                            <li id="confirm"><strong>payment details</strong></li>
                        </ul>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <br>
                        <!-- fieldsets -->
                        <fieldset>
                            <!-- <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Account Information:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Step 1 - 4</h2>
                                    </div>
                                </div>
                                <label class="fieldlabels">Email: *</label>
                                <input type="email" name="email" placeholder="Email Id"/>
                                <label class="fieldlabels">Username: *</label>
                                <input type="text" name="uname" placeholder="UserName"/>
                                <label class="fieldlabels">Password: *</label>
                                <input type="password" name="pwd" placeholder="Password"/>
                                <label class="fieldlabels">Confirm Password: *</label>
                                <input type="password" name="cpwd" placeholder="Confirm Password"/>
                            </div>
                            <input type="button" name="next" class="next action-button" value="Next"/> -->
                            
                            <div class="form-card">
                            <div class="container">
                                <div class="row">

                                    <div class="col-9 first">
                                        <div class="row">
                                            <div class="col">
                                                <label for="basic-url" class="form-label">From</label>
                                                <select class="form-select" aria-label="Default select example" name="from_country">
                                                    <option selected  >Country</option>
                                                <?php foreach($countries as $country): ?>
                                                    <option >
                                                        <?php echo $country["name"] ?>
                                                    </option>
                                                    <?php endforeach;?>
                                                </select>
                                            </div>
                                            <div class="col">
                                                <label for="basic-url" class="form-label">To</label>
                                                <select class="form-select" aria-label="Default select example" name="to_country">
                                                    <option selected >Country</option>
                                                    <?php foreach($countries as $country): ?>
                                                    <option >
                                                        <?php echo $country["name"] ?>
                                                    </option>
                                                    <?php endforeach;?>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- second row -->
                                        <div class="row" style="margin-top: 5%;">
                                            <div class="col">
                                                <input type="text"  name="post1" class="form-control" placeholder="City or Post Code">
                                            </div>
                                            <div class="col">
                                                <input type="text" name="post2" class="form-control" placeholder="City or Post Code" >
                                            </div>
                                        </div>
                                        <!-- third row -->
                                        <div class="row" style="margin-top: 5%;">
                                            <div class="col">
                                                <select class="form-select" aria-label="Default select example" name="personal">
                                                    <option selected>Personalised Parcel</option>
                                                </select>
                                            </div>
                                            <div class="col">
                                            </div>
                                        </div>
                                        <!-- fourth row -->
                                        <div class="row" style="margin-top: 5%;">
                                            <div class="col">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="input-group flex-nowrap">

                                                            <input type="number" class="form-control numbers"
                                                                placeholder="ًWeight:Kg" aria-label="Weight"
                                                                aria-describedby="addon-wrapping"
                                                                style="background-color: white;"
                                                                name="weight">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="input-group flex-nowrap">

                                                            <input type="number" class="form-control numbers"
                                                                placeholder="ًLength:cm" aria-label="Length"
                                                                aria-describedby="addon-wrapping"
                                                                style="background-color: white;"
                                                                name="length">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="input-group flex-nowrap">

                                                            <input type="number" class="form-control numbers"
                                                                placeholder="ًWidth:cm" aria-label="Width"
                                                                aria-describedby="addon-wrapping"
                                                                style="background-color: white;"
                                                                name="width">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="input-group flex-nowrap">

                                                            <input type="number" class="form-control numbers"
                                                                placeholder="ًHeight:cm" aria-label="Height"
                                                                aria-describedby="addon-wrapping"
                                                                style="background-color: white;"
                                                                name="height">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                            </div>
                                        </div>
                                        <!-- fivth row -->
                                    </div>

                                </div>
                              </div>
                            </div>
                              <input type="button" name="next" class="next action-button" value="Next"/>
                            </fieldset>
                        <!-- two <fieldset></fieldset> -->
                        <fieldset>
                            <div class="form-card">
                                <div class="cardd">
                                    <div class="firstt">
                                        <span style="font-size: 20px;    font-family: cursive;
                                        font-weight: bold">4</span>
                                        <span>Days</span> ESTIMATED
                                    </div>
                                    <div class="two">
                                        <span class="btn-primary prim">Posteitaliane</span>
                                        <p style="margin-top: 14%;">Crono Standard</p>
                                    </div>
                                    <div class="three">
                                        <i class="fa-solid fa-rectangle-history"></i><span>collection</span><br>
                                        <span>Mon, August 22</span>
                                        <p>Lorem ipsum dolor sit amet consectetur i?</p>
                                    </div>
                                    <div class="four">
                                        <i class="fa-solid fa-rectangle-history"></i><span>Delivery</span><br>
                                        <span>Mon, August 22</span>
                                        <p>Lorem ipsum dolor sit amet consectetur i?</p>
                                    </div>
                                    <div class="five">
                                        <span style="color: #ffc700;
                                        /* margin-top: 15%; */
                                        position: relative;
                                        top: 25%;
                                        left: 40%;
                                        font-weight: bold;
                                        font-size: 28px;">$5.18</span>
                                        <button class="btn btn-warning" style="margin-top: 30%; margin-left: 38%;">Book Now</button>
                                    </div>
                                </div>
                                <hr>
                                <i></i>
                                <span>Printer required</span>
                            </div>
                            <input type="button" name="next" class="next action-button" value="Next" />
                            <input type="button" name="previous" class="previous action-button-previous"
                                value="Previous" />
                        </fieldset>
                        <!-- three fieldset -->
                        <fieldset>
                            <div class="form-card">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-9 first">
                                            <!-- row -->
                                            <div class="row">
                                                <div class="col">
                                                    <input type="text" class="form-control" id="inputText" placeholder="First Name" name="first_name">                                                </div>
                                                <div class="col">
                                                    <input type="text" class="form-control" id="inputText" placeholder="Last Name" name="last_name">
                                                </div>
                                            </div>
                                            <!-- end row -->
                                            <!-- row -->
                                            <div class="row">
                                                <div class="col">
                                                    <input type="email" class="form-control" id="inputText" placeholder="Email" name="email1">                                                </div>
                                                <div class="col">
                                                    <input type="email" class="form-control" id="inputText" placeholder="Email" name="email2">
                                                </div>
                                            </div>
                                            <!-- end row -->
                                            <!-- row -->
                                            <div class="row">
                                                <div class="col">
                                                    <input type="text" class="form-control" id="inputText" placeholder="Address" name="address1">                                                </div>
                                                <div class="col">
                                                    <input type="text" class="form-control" id="inputText" placeholder="Address" name="address2">
                                                </div>
                                            </div>
                                            <!-- end row -->
                                            <!-- row -->
                                            <div class="row">
                                                <div class="col">
                                                    <input type="number" class="form-control" id="inputText" placeholder="Phone Num" name="phone1">                                                </div>
                                                <div class="col">
                                                    <input type="number" class="form-control" id="inputText" placeholder="Phone Num" name="phone2">
                                                </div>
                                            </div>
                                            <!-- end row -->
                                            <!-- row -->
                                            <div class="row">
                                                <div class="col">
                                                    <input type="text" class="form-control" id="inputText" placeholder="Company (Optional)" name="company1">                                                </div>
                                                <div class="col">
                                                    <input type="text" class="form-control" id="inputText" placeholder="Company (Optional)" name="company2">
                                                </div>
                                            </div>
                                            <!-- end row -->
                                        </div>
                                    </div>
                            </div>
                            </div>
                            <input type="button" name="next" class="next action-button" value="Submit" />
                            <input type="button" name="previous" class="previous action-button-previous"
                                value="Previous" />
                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                <br><br>
                                <img src="assets/1bbac290-1134-488c-bbac-012eb59fdee4.jfif" class="img-fluid finsh-img">
                                <input type="submit" style="margin: auto; display: inline-block; width: 15%; margin-left: 18%;" name="next" class="next action-button " value="Confirm" />
                            </div>
                        </fieldset>
                    </form>
                </div>

            </div>
            <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 text-center p-0  ">
               
                    <div class="parent card" style="background: none;padding: 10%;">
                        <button type="button" class="btn btn-outline-warning btn1">Close</button>    
                        <button class="btn btn-primary btn2" type="submit">Save</button>
                        <div><h3 style="margin-top: 26%;color:#ffc700;">SUMMARY</h3></div>
                        
                        <div class="card cards">
                           <div class="card-body">
                             <h5>From</h5>
                        <?php if(!empty($from_country)): ?>
                                    <?php foreach($count as $c):?>
                                        <?php echo $c["from_country"];?>
                                        <?php endforeach;?>
                           <?php endif; ?>
                           </div>
                           <h5>To</h5>
                           <?php if(!empty($from_country)): ?>
                                    <?php foreach($count as $c):?>
                                        <?php echo $c["to_country"];?>
                                        <?php endforeach;?>
                           <?php endif; ?>
                           </div>
                         </div>
                         <br>

                       </div>
                

                    
            </div>
        </div>
    </div>
</body>

</html>