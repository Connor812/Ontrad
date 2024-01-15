<hr style="border-top: 2px solid white;">

<div class="container-fluid ontradgreenlite py-3" style="width: 100%; color:white;">
    <h4 class="text-center">CONTACT US</h4>
    <div class="row p-2">
        <div class="col" style="width: 100%; text-align: center;">
            <h5 style="color: white;"><a style="color: white;"
                    href="mailto:mail@ontariotraditionalmusic.com">mail@ontariotraditionalmusic.com</a></h5>
        </div>
    </div>
    <!-- Button to Open the Modal -->
    <div style="text-align: center;">
        <button type="button" class="button1" data-toggle="modal" data-target="#dropline">
            Send us your comments
        </button>
    </div>
    <!-- The Modal -->
    <div class="modal" id="dropline">
        <div class="modal-dialog">
            <div class="modal-content" style="text-align: center;">
                <div class="alert alert-light m-0" style="padding: 3% 5% 3% 5%">
                    <img src="images/ontradlogo.jpg" style="text-align: center; width:100%">

                    <p>We welcome your questions, comments and suggestions
                    </p>
                    <form action="functions/send_comment.php" method="post">
                        <div class="col-sm-12 form-group">
                            <input class="form-control" id="name" name="name" placeholder="Name" type="name" required>
                        </div>
                        <div class="col-sm-12 form-group">
                            <input class="form-control" id="email" name="email" placeholder="Email" type="email"
                                required>
                        </div>

                        <textarea class="form-control" id="comments" name="comments" placeholder="Comment"
                            rows="5"></textarea><br>
                        <div class="row">
                            <p>Thank you for taking the time to reach out</p>
                            <div class="col-sm-12 form-group">
                                <button class="button1 center" type="submit">Send Comment</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <br><br>
    </div>
    <div style="text-align: center; padding: 5% 2% 1% 2%">
        <div class="littlestfont"><small>- CREATED BY BUSINESSLORE -</small>
        </div>
    </div>
</div>