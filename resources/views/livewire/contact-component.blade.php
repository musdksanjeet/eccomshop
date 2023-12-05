<div>
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_02_parallax"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>Contact Us</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li>/</li>
                        <li>Contact Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="content-central">
       <!--  <div class="semiboxshadow text-center">
            <img src="{{asset('img/img-theme/shp.png')}}" class="img-responsive" alt="">
        </div> -->

        <div id="map" class="honmob">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3502.3663947963605!2d77.37718367529288!3d28.618778984705536!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cef5e2369b331%3A0x2d206ff025b772dc!2sRecenturesoft%20Infotech%20Pvt%20Ltd!5e0!3m2!1sen!2sin!4v1701770110296!5m2!1sen!2sin" width="1230" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
        <div class="content_info">
            <div class="paddings-mini">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <aside>
                                <h4>The Office</h4>
                                <address>
                                    <strong>Recenturesoft Infotech Pvt.Ltd.</strong><br>
                                    <i class="fa fa-map-marker"></i><strong>Address: </strong>
                                        A-125, A Block, Sector 63, Noida, Uttar Pradesh 201301<br>
                                    <i class="fa fa-phone"></i><strong>Phone: </strong> +91-77700 03288
                                </address>
                                <address>
                                    <strong>Recenturesoft Emails</strong><br>
                                    <i class="fa fa-envelope"></i><strong>Email:</strong><a
                                        href="mailto:info@recenturesoft.co"> info@recenturesoft.com</a><br>

                                    <i class="fa fa-envelope"></i><strong>Website:</strong><a
                                        href="www.recenturesoft.com"> www.recenturesoft.com</a>
                                </address>
                            </aside>
                            <hr class="tall">
                        </div>
                        <div class="col-md-8">
                            <h3>Contact Form</h3>
                            <p class="lead">
                            </p>
                            @if(Session::has('message'))
                                <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                            @endif
                            <form id="contactform" class="form-theme" method="post" wire:submit.prevent="sendMessage">                                
                                <input type="text" placeholder="Name" name="name" id="name" wire:model="name" required="">
                                @error('name') <p class="text-danger">{{$message}}</p> @enderror
                                <input type="email" placeholder="Email" name="email" id="email" wire:model="email" required="">
                                @error('email') <p class="text-danger">{{$message}}</p> @enderror
                                <input type="text" placeholder="Phone" name="phone" id="phone" wire:model="phone" required="">    
                                @error('phone') <p class="text-danger">{{$message}}</p> @enderror                            
                                <textarea placeholder="Your Message" name="message" id="message" wire:model="message" required=""></textarea>
                                @error('message') <p class="text-danger">{{$message}}</p> @enderror
                                <input type="submit" name="Submit" value="Send Message" class="btn btn-primary">
                            </form>
                            <div id="result"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-twitter content_resalt border-top">
            <i class="fa fa-twitter icon-big"></i>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>