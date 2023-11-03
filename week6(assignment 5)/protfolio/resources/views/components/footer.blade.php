  <section id="contact">
            <p class="section__text__p1">Get in Touch</p>
            <h1 class="title">Contact Me</h1>
            <div class="contact-info-upper-container">
                <div class="contact-info-container">
                    <img
                        src="{{asset('./assets/email.png')}}"
                        alt="Email icon"
                        class="icon contact-icon email-icon"
                    />
                    <p>
                        <a href="mailto:mdmahaburrahmannadim@gmail.com"
                            >mdmahaburrahmannadim@gmail.com</a
                        >
                    </p>
                </div>
                <div class="contact-info-container">
                    <img
                        src="{{asset('./assets/linkedin.png')}}"
                        alt="LinkedIn icon"
                        class="icon contact-icon"
                    />
                    <p><a href="https://www.linkedin.com/in/mdmrnadim/">LinkedIn</a></p>
                </div>
            </div>
        </section>
        <footer>
            <nav>
                <div class="nav-links-container">
                    <ul class="nav-links">
                        <li><a href="{{route('experience')}}">Experience</a></li>
                        <li><a href="{{route('projects')}}">Projects</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>
            </nav>
            <p>Copyright &#169; 2023 Md. MR. Nadim. All Rights Reserved.</p>
        </footer>
        <script src="{{asset('script.js')}}"></script>
    </body>
</html>
