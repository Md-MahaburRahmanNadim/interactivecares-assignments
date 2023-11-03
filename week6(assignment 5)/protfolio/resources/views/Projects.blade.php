@include('components.header')

        <section id="projects">
            <p class="section__text__p1">Browse My Recent</p>
            <h1 class="title">Projects</h1>
            <div class="experience-details-container">
                <div class="about-containers">
                    <div class="details-container color-container">
                        <div class="article-container">
                            <img
                                src="./assets/project-1.png"
                                alt="Project 1"
                                class="project-img"
                            />
                        </div>
                        <h2 class="experience-sub-title project-title">
                            Communication
                        </h2>
                        <div class="btn-container">
                            <button
                                class="btn btn-color-2 project-btn"
                                onclick="location.href='{{route('projects')}}/communication'"
                            >
                                Read More
                            </button>
                            <button
                                class="btn btn-color-2 project-btn"
                                onclick="location.href='https://github.com/'"
                            >
                                Live Demo
                            </button>
                        </div>
                    </div>
                    <div class="details-container color-container">
                        <div class="article-container">
                            <img
                                src="./assets/project-2.png"
                                alt="Project 2"
                                class="project-img"
                            />
                        </div>
                        <h2 class="experience-sub-title project-title">
                            Productivity
                        </h2>
                        <div class="btn-container">
                            <button
                                class="btn btn-color-2 project-btn"
                                onclick="location.href='{{route('projects')}}/productivity'"
                            >

                            Read More
                            </button>
                            <button
                                class="btn btn-color-2 project-btn"
                                onclick="location.href='https://github.com/'"
                            >
                                Live Demo
                            </button>
                        </div>
                    </div>
                    <div class="details-container color-container">
                        <div class="article-container">
                            <img
                                src="./assets/project-3.png"
                                alt="Project 3"
                                class="project-img"
                            />
                        </div>
                        <h2 class="experience-sub-title project-title">
                            Food
                        </h2>
                        <div class="btn-container">
                            <button
                                class="btn btn-color-2 project-btn"
                                onclick="location.href='{{route('projects')}}/food'"
                            >
                                Read More
                            </button>
                            <button
                                class="btn btn-color-2 project-btn"
                                onclick="location.href='https://github.com/'"
                            >
                                Live Demo
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <img
                src="./assets/arrow.png"
                alt="Arrow icon"
                class="icon arrow"
                onclick="location.href='./#contact'"
            />
        </section>

        @include('components.footer')
