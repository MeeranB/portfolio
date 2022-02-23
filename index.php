        
<?php

include 'include/sidebar.php';

?>
        <main>
            <!-- hero-image -->
            <div id="hero" class="hero-image">
                <div class="overlay"></div>
                <span class="hero-text">
                    <span class="hero-text--title">My Name is Meeran Bala-Kumaran</span><br>
                    <span class="hero-text--subtitle">I am a Web Developer</span>
                </span>
                <a class="scroll-prompt--down" href="#projects">
                    <p>Scroll down</p>
                    <i class="icon-cheveron-down"></i>
                </a>
            </div>
            <!-- /hero-image -->
            <!-- projects -->
            <div class="projects-section container">
                <h2 id="projects" class="projects-section-title">Projects</h2>
                <div class="row project-card-section">
                    <div class="project-card-container col-12">
                        <article class="project-card">
                            <div class="project-card-content">
                                <h2 class="project-card-title">
                                    Netmatters Fascimile
                                </h2>
                                <p class="project-card-body">
                                    A cross browser compatible replica of the Netmatters site, built using HTML, CSS with SASS and Javascript.
                                </p>
                                <a href="https://github.com/MeeranB/HTML-CSS-Reflection" class="button" target="_blank">View code</a>
                                <a href="https://meeran-bala-kumaran.netmatters-scs.co.uk/netmatters/" class="button" target="_blank">View demo</a>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
            <!-- /projects -->
            <!-- contact -->
            <div class="contact-form-container container pb-5">
                <form id="contact-form" class="row">
                    <h2 id="contact" class="contact-section-title mb-5">Contact me</h2>
                    <p class="contact-prompt">I am open to career opportunities, and can be contacted at <a class="main-link" href="mailto:meeran.bala-kumaran@netmatters-scs.co.uk"><span>meeran.bala-kumaran@netmatters-scs.co.uk</span></a> or via the contact form.</p>
                    <div class="col-12 col-lg-6 pt-3">
                        <label for="fname">First name*&nbsp;&nbsp;</label>
                        <label id="fname-error" class="error" for="fname"></label>
                        <input id="fname" name="fname" minlength="2" type="text" class="form-control" placeholder="First name" aria-label="First name" required>
                    </div>
                    <div class="col-12 col-lg-6 pt-3">
                        <label for="lname">Last name*&nbsp;&nbsp;</label>
                        <label id="lname-error" class="error" for="lname"></label>
                        <input id="lname" name="lname" minlength="2" type="text" class="form-control" placeholder="Last name" aria-label="Last name" required>
                    </div>                    
                    <div class="col-12 col-lg-6 pt-3">
                        <label for="email">Email*&nbsp;&nbsp;</label>
                        <label id="email-error" class="error" for="email"></label>
                        <input id="email" name="email" type="email" class="form-control" placeholder="Email" aria-label="Email" required>
                    </div>
                    <div class="col-12 col-lg-6 pt-3">
                        <label for="subject">Subject*&nbsp;&nbsp;</label>
                        <label id="subject-error" class="error" for="subject"></label>
                        <input id="subject" name="subject" minlength="2" type="text" class="form-control" placeholder="Subject" aria-label="Subject" required>
                    </div>
                    <div class="col-12 mb-4 message pt-3">
                        <label for="message">Message*&nbsp;&nbsp;</label>
                        <label id="message-error" class="error" for="message"></label>
                        <textarea id="message" name="message" minlength="2" class="form-control message-input" placeholder="Message" aria-label="Message" required></textarea>
                    </div>
                    <div class="col-12 row">
                        <input id="contact-submit" type="submit" value="Submit" class="btn btn-success col-4">
                        <div class="success-prompt col-12 col-sm-7"><span>Your message has been submitted successfully.</span></div>
                    </div>
                </form>
            </div>
            <!-- /contact -->
            <a class="scroll-prompt--up" href="#hero">
                <p>Back to top</p>
                <i class="icon-cheveron-up"></i>
            </a>
        </main>
    </div> <!-- page container div -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-sidebar/3.3.2/jquery.sidebar.min.js"></script>
    <script src="https://unpkg.com/typewriter-effect@latest/dist/core.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>