<div class="contact_form">
    <p>All fields required</p>
    <form onsubmit="mailForm(this.name.value, this.email.value, this.message.value)">
        <label for="name" class="label"><strong>Full Name: </strong></label><br>
        <input tabindex="6" type="text" name="name" id="name" class="field item" placeholder="Please enter your full name" required><br>
        <label for="email" class="label"><strong>Email Address: </strong></label><br>
        <input tabindex="7" type="email" name="email" id="email" class="field item" placeholder="Please enter your email address" required><br>
        <label for="msg" class="label"><strong>Message: </strong></label><br>
        <textarea tabindex="8" name="message" id="msg" class="texta item" placeholder="Please enter your message" required data-gramm="false" data-gramm_editor="false" data-enable-grammarly="false"></textarea><br>
        <input tabindex="9" type="submit" class="btn btn-primary btn-sm px-4 py-2 rounded-3 shadow-sm hover-button item" value="Send Message">
    </form>
</div>