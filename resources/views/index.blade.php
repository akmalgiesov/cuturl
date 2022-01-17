<!DOCTYPE html>
<html>
  <head>
    <title>Сервис по сокращению ссылок</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('assets/css/main.min.css')}}" />
  </head>
    <body>
      <div id="Cover">
        <div class="uk-section uk-padding-remove">
          <div class="uk-container">
            <div class="uk-card uk-text-center">
              <img src="{{asset('assets/media/clip-1059.png')}}" alt="Image" width="550">
              <div id="UrlShortenerApp">
                <app></app>
              </div>
             </div>
          </div>
        </div>
      </div>
    </body>
    <script src="{{asset('assets/js/uikit.min.js') }}"></script>
    <script src="{{asset('assets/js/app.js') }}"></script>

</html>
