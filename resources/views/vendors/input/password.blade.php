@if ($input_type == "password")
    <div class="input-group-append">
        <input type="checkbox" id="show-hide-password" class="d-none show-hide-password" name="show-hide-password" value="1" {{ old("show-hide-password") == "1" ? "checked" : "" }}>
        <label class="input-group-text btn btn-primary" for="show-hide-password">
            <i id="eye-on" class="fas fa-eye fa-fw text-white"></i>
            <i id="eye-off" class="fas fa-eye-slash fa-fw text-white d-none"></i>
        </label>
    </div>
@endif
