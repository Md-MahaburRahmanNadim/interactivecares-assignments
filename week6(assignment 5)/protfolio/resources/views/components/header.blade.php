<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>My Portfolio</title>
        {{-- <link rel="stylesheet" href="./style.css" />
        <link rel="stylesheet" href="./mediaqueries.css" />
        this hard coded style work file in those url where has no url paramter. But in url parameter page those style are not loaded why?

        --}}
        <link rel="stylesheet" href="{{asset('style.css')}}" />
        <link rel="stylesheet" href="{{asset('mediaqueries.css')}}" />
    </head>
    <body>
        <nav id="desktop-nav">
            <div class="logo"><a href="{{route('home')}}">Md MR. Nadim</a></div>
            <div>
                <ul class="nav-links">
                    <li><a href="{{route('experience')}}">Experience</a></li>
                    <li><a href="{{route('projects')}}">Projects</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div>
        </nav>
        <nav id="hamburger-nav">
            <div class="logo">Nadim</div>
            <div class="hamburger-menu">
                <div class="hamburger-icon" onclick="toggleMenu()">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="menu-links">
                    <li><a href="#about" onclick="toggleMenu()">About</a></li>
                    <li>
                        <a href="#experience" onclick="toggleMenu()"
                            >Experience</a
                        >
                    </li>
                    <li>
                        <a href="#projects" onclick="toggleMenu()">Projects</a>
                    </li>
                    <li>
                        <a href="#contact" onclick="toggleMenu()">Contact</a>
                    </li>
                </div>
            </div>
        </nav>
