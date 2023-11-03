@include('components.header')
        <section id="profile">
            <div class="section__pic-container">
                <img
                    src="{{$homePageData['image']}}"
                    alt="{{$homePageData['name']}} profile picture"
                />
            </div>
            <div class="section__text">
                <p class="section__text__p1">Assalamolikum , I'm</p>
                <h1 class="title">{{$homePageData['name']}}</h1>
                <p class="section__text__p2">{{$homePageData['designation']}}</p>
                <div class="btn-container">
                    <button
                        class="btn btn-color-2"
                        onclick="window.open('{{$homePageData['cv']}}', '_blank}}')"
                    >
                        Download CV
                    </button>
                    <button
                        class="btn btn-color-1"
                        onclick="location.href='./#contact'"
                    >
                        Contact Info
                    </button>
                </div>
                <div id="socials-container">
                    <img
                        src="./assets/linkedin.png"
                        alt="My LinkedIn profile"
                        class="icon"
                        onclick="location.href='{{$homePageData['linkedin']}}'"
                    />
                    <img
                        src="./assets/github.png"
                        alt="My Github profile"
                        class="icon"
                        onclick="location.href='{{$homePageData['github']}}'"
                    />
                </div>
            </div>
        </section>


@include('components.footer')
