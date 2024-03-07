<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ձեր հարցի Պատասխանը</title>
  <style>
    /* Add your custom styles here */
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 20px;
    }
    .container {
      max-width: 600px;
      margin: auto;
      background: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0,0,0,0.1);
    }
    h1, p {
      margin-top: 0;
      color: #333;
    }
    .signature {
      margin-top: 30px;
      font-style: italic;
      color: #777;
    }
    .button {
      display: inline-block;
      background-color: #007bff;
      color: #fff;
      text-decoration: none;
      padding: 12px 24px;
      border-radius: 5px;
      margin-top: 30px;
      transition: background-color 0.3s ease;
    }
    .button:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="container">
     <h1>Ձեր հարցի Պատասխանը</h1>
     <p>Հարգելի {{$username}},</p>
     <p>Շնորհակալ ենք "{{$question}}"-ի վերաբերյալ ձեր հարցադրման համար։</p>
     <p>{{$answer}}</p>
     <p>Եթե ունեք լրացուցիչ հարցեր կամ որևէ պարզաբանման կարիք ունեք, խնդրում ենք մի հապաղեք հարցնել:</p>
     <p>Եվս մեկ անգամ շնորհակալություն:</p>
     <p class="signature">Հարգանքներով,<br>Փորձ և Հմտություն<br>{{ env('APP_URL') }}</p>
     <a href="{{env('APP_URL')}}" class="button">Այցելեք մեր կայքը</a>
  </div>
</body>
</html>
