<!DOCTYPE html>
<html lang="eng">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
 
        <title>Shopping-cart</title>
        
        {{-- Bootstrap CDN --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        {{-- Owl Carousel 2 CDN --}}
        <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" rel="stylesheet">

        {{-- Font Awesome CDN --}}
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Baloo+Thambi+2&family=Raleway&family=Rubik&display=swap" rel="stylesheet">


        <style>
            @import url("https://fonts.googleapis.com/css2?family=Roboto&display=swap");
            * {
            box-sizing: border-box;
            }
            body {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            background-color: #f7f8fc;
            font-family: "Roboto", sans-serif;
            color: #10182f;
            }
            .items-cards {
            display: inline-flex;
            width: 350px;
            justify-content: space-evenly;
            flex-wrap: wrap;
            }
            .item-card {
            margin: 10px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            width: 300px;
            }
            .item-header img {
            width: 80%;
            height: 200px;
            margin-left: 25px;
            margin-top: 10px; */
            object-fit: cover;
            }
            .item-body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            padding: 20px;
            min-height: 250px;
            }
            
            .tag {
            background: #cccccc;
            border-radius: 50px;
            font-size: 12px;
            margin: 0;
            color: #fff;
            padding: 2px 10px;
            text-transform: uppercase;
            cursor: pointer;
            }
            .tag-teal {
            background-color: #47bcd4;
            }
            .tag-purple {
            background-color: #5e76bf;
            }
            .tag-pink {
            background-color: #cd5b9f;
            }
            
            .form-control-sm {
                width: 30px;
            }

            .quantity {
                width: 100px;
                margin-right: 20px;
            }
            </style>

    </head>
    <body class="antialiased">

        <div class="container--">
        {{View::make('product-layout')}}
        {{View::make('carousel')}}

        </div>

    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" rel="stylesheet"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sass.js/0.9.2/sass.min.js"></script>
</html>