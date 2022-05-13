@section("name", trans("page.{$menu_name}"))
@section("icon", $menu_icon)

@section("{$menu_slug}-active", "active")

<div>
    <section class="htc__contact__area ptb--80 bg__white">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact__wrap">
                        <h2 class="title__style--2">{{ trans("general.Contact Info") }}</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                        <div class="htc__contact__inner">

                            <div class="contact__address">
                                <div class="cont__icon">
                                    <i class="icon ion-ios-location"></i>
                                    <span>{{ trans("validation.attributes.address") }}</span>
                                </div>
                                <p>{{ env("CONTACT_ADDRESS") }}</p>
                            </div>

                            <div class="contact__address">
                                <div class="cont__icon">
                                    <i class="icon ion-android-call"></i>
                                    <span>{{ trans("validation.attributes.phone6") }}</span>
                                </div>
                                <p><a href="tel:+00123456789">(801) 2345 - 6789</a></p>
                            </div>

                            <div class="contact__address">
                                <div class="cont__icon">
                                    <i class="icon ion-android-mail"></i>
                                    <span>Email</span>
                                </div>
                                <p><a draggable="false" href="mailto:{{ env("CONTACT_EMAIL") }}">{{ env("CONTACT_EMAIL") }}</a></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 sm-mt-40 xs-mt-40">
                    <div class="htc__contact__form__wrap">
                        <h2 class="contact__title">Send A Message</h2>
                        <div class="contact-form-wrap">
                            <form id="contact-form" action="https://whizthemes.com/mail-php/other/mail.php" method="post">
                                <div class="single-contact-form name">
                                    <div class="contact-box name_email">
                                        <input type="text" name="con_name" placeholder="Your Name*">
                                        <input type="email" name="con_email" placeholder="Your Email *">
                                    </div>
                                </div>
                                <div class="single-contact-form">
                                    <div class="contact-box subject">
                                        <input type="text" placeholder="Subject*">
                                    </div>
                                </div>
                                <div class="single-contact-form">
                                    <div class="contact-box message">
                                        <textarea name="con_message"  placeholder="Message"></textarea>
                                    </div>
                                </div>
                                <div class="contact-btn">
                                    <button type="submit" class="htc__btn btn--theme">Submit</button>
                                </div>
                            </form>
                        </div>
                        <div class="form-output">
                            <p class="form-messege"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="map-contacts">
        <div id="googleMap">
            <iframe src="{{ env("CONTACT_GOOGLE_MAPS_IFRAME") }}"></iframe>
        </div>
    </div>
</div>
