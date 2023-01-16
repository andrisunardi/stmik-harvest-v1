@section("title", trans("index.chat"))
@section("icon", "fas fa-chat")
@section("chat-active", "active")

<div>
    <div class="section mt-2">
        <h2 class="text-center h2">@yield("title")</h2>
        <h6 class="text-center h6">
            @if (App::isLocale("en"))
                {{-- Send us the concept you want to make so we can analyze the processing time and price that suits you --}}
            @else
                {{-- Kirimkan konsep yang anda ingin buat agar kami bisa menganalisa waktu pengerjaan dan harga yang cocok untuk anda --}}
            @endif
        </h6>
    </div>

    <div class="message-divider">
        Friday, Sep 20, 10:40 AM
    </div>

    <div class="message-item">
        <img src="assets/img/sample/avatar/avatar1.jpg" alt="avatar" class="avatar">
        <div class="content">
            <div class="title">John</div>
            <div class="bubble">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            </div>
            <div class="footer">10:44 AM</div>
        </div>
    </div>

    <div class="message-item user">
        <div class="content">
            <div class="bubble">
                Aenean volutpat.
            </div>
            <div class="footer">10:46 AM</div>
        </div>
    </div>

    <div class="message-divider">
        Friday, Sep 21, 7:40 PM
    </div>

    <div class="message-item">
        <img src="assets/img/sample/avatar/avatar1.jpg" alt="avatar" class="avatar">
        <div class="content">
            <div class="title">John</div>
            <div class="bubble">
                Aenean hendrerit porttitor dolor id elementum. Mauris nec purus pulvinar, fringilla ex eget,
                ultrices urna.
            </div>
            <div class="footer">10:40 AM</div>
        </div>
    </div>

    <div class="message-item user">
        <div class="content">
            <div class="bubble">
                <img src="assets/img/sample/photo/2.jpg" alt="photo" class="imaged w160">
            </div>
            <div class="footer">10:46 AM</div>
        </div>
    </div>

    <div class="message-item user">
        <div class="content">
            <div class="bubble">
                Maecenas sollicitudin justo vel posuere eleifend. In eget iaculis mi, vitae suscipit dui. Phasellus
                a facilisis magna, eget aliquam turpis. Nullam eros neque, varius vitae commodo blandit, placerat
                quis est.
            </div>
            <div class="footer">10:40 AM</div>
        </div>
    </div>

    <div class="message-item">
        <img src="assets/img/sample/avatar/avatar1.jpg" alt="avatar" class="avatar">
        <div class="content">
            <div class="title">John</div>
            <div class="bubble">
                <img src="assets/img/sample/photo/5.jpg" alt="photo" class="imaged w160">
            </div>
            <div class="footer">10:40 AM</div>
        </div>
    </div>

    <div class="message-item">
        <img src="assets/img/sample/avatar/avatar1.jpg" alt="avatar" class="avatar">
        <div class="content">
            <div class="title">John</div>
            <div class="bubble">
                Aenean hendrerit porttitor dolor id elementum. Mauris nec purus pulvinar, fringilla ex eget,
                ultrices urna.
            </div>
            <div class="footer">10:40 AM</div>
        </div>
    </div>

    <div class="chatFooter">
        <form>
            <a href="javascript:;" class="btn btn-icon btn-text-secondary rounded">
                <ion-icon name="camera"></ion-icon>
            </a>
            <div class="form-group basic">
                <div class="input-wrapper">
                    <input type="text" class="form-control" placeholder="Type a message...">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
            </div>
            <button type="button" class="btn btn-icon btn-primary rounded">
                <ion-icon name="arrow-forward-outline"></ion-icon>
            </button>
        </form>
</div>
</div>
