<html>
<head>
    <title>404 Not Found</title>

    <style>
        html {
            background-image: url({{url("/img/Error_404/404.png")}});
            background-size: cover;
            background-repeat: no-repeat;
        }
        .information-retour a{
            font-size: 3rem;
            text-decoration: none;
            font-family: 'Roboto',sans-serif;
            font-weight: bold;
            background-color: #08546c;
            padding: 0.5%;
            color: white;
            border-radius: 2rem;
            border: groove 0.2rem #a0bacc;
            align-content: center;
        }


        @media screen and (max-device-width: 360px)  {
            html{
                /*    affichage mobile*/
                background-image: url({{url("/img/Error_404/404tel.png")}});
            }
        }


    </style>
</head>

<body>
<div class="bouton-retour">
    <a href="{{route('home')}}">Retour</a>
</div>
</body>
</html>
