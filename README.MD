# aamra WiFI Cloud Page (Facebook AccountKit)

**These WiFi pages use Facebook's accountkit to send passwords to users.**

### Description

The login.html page on the Mikrotik redirects the user to these pages. The user's information is then collected and passed to Facebook's accountkit - which handles sending the OTP and verifying it. After receiving confirmation from accountkit, the user is redirected to the verify page on the Mikrotik.

### Structure

```
│   ackitlogin.php
│   func.php
│   index.php
│   README.MD
│   serverFacebook.php
│   serverManual.php
│
├───css
│       bootstrap.min.css
│       responsive.css
│       style.css
│
├───fonts
│       glyphicons-halflings-regular.eot
│       glyphicons-halflings-regular.svg
│       glyphicons-halflings-regular.ttf
│       glyphicons-halflings-regular.woff
│       glyphicons-halflings-regular.woff2
│       neo_sans-webfont.eot
│       neo_sans-webfont.svg
│       neo_sans-webfont.ttf
│       neo_sans-webfont.woff
│       neo_sans-webfont.woff2
│
├───img
│   │   bg_main.jpg
│   │   container-bg.png
│   │   f-logo.png
│   │   f-logo_m.png
│   │   pass-of.png
│   │   top_logo.png
│   │   top_logo_m.png
│   │   WE-Ad.gif
│   │
│   └───New folder
│           2bg-a.png
│           2bg.png
│           aa-n-m.png
│           bg_main.jpg
│           container-bg.png
│           f-logo.png
│           f-logo_m.png
│           i-agree.png
│           i-agree2.png
│           M-bg.png
│           mob-butt.png
│           t.png
│           top_logo.png
│           top_logo_m.png
│           WE-Ad.gif
│
├───js
│       bootstrap.min.js
│       jquery-1.4.4.js
│       jquery.js
│       jquery.min.js
│
└───nbproject
    │   project.properties
    │   project.xml
    │
    └───private
            private.properties
```