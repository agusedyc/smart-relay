<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

         <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        {{-- <div class="flex-center position-ref full-height"> --}}
            <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
            <div class="content">
                {{-- <h4 id="saklar0"></h4> --}}
                {{-- <p> --}}
                    {{-- <button id="saklar1" onclick="d1(0,9);" class="btn btn-danger">OFF</button>
                    <button id="saklar2" onclick="d1(1,9);" class="btn btn-info">ON</button> --}}
                {{-- </p> --}}

                <div align=center>

                  <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
                   style='border-collapse:collapse;border:none'>
                   <tr style='height:3.5pt'>
                    <td width=226 rowspan=4 style='width:169.85pt;border:solid windowtext 1.0pt;
                    padding:0cm 5.4pt 0cm 5.4pt;height:3.5pt'>
                    <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
                    text-align:center;line-height:normal'><span lang=IN style='font-size:16.0pt;
                    font-family:"Times New Roman",serif'>Garasi
                        <h4 style="text-align: center" id="d14"></h4>
                        <button onclick="d14(0,14);" class="btn btn-danger btn-block">OFF</button>
                        <button onclick="d14(1,14);" class="btn btn-info btn-block">ON</button>
                    </span></p>
                    </td>
                    <td style='border:none;border-bottom:solid windowtext 1.0pt' width=637
                    colspan=4><p class='MsoNormal'>&nbsp;</td>
                    <td style='height:3.5pt;border:none' width=0 height=5></td>
                   </tr>
                   <tr style='height:63.5pt'>
                        <p><b>Kipas</b></p>
                        <h4 style="text-align: center" id="d15"></h4>
                        <button onclick="d15(0,15);" class="btn btn-danger">OFF</button>
                        <button onclick="d15(1,15);" class="btn btn-info">ON</button>
                    <td width=198 style='width:148.7pt;border-top:none;border-left:none;
                    border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
                    padding:0cm 5.4pt 0cm 5.4pt;height:63.5pt'>
                    <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
                    text-align:center;line-height:normal'><span lang=IN style='font-size:16.0pt;
                    font-family:"Times New Roman",serif'>Dapur</span>
                        <h4 style="text-align: center" id="d7"></h4>
                        <button onclick="d7(0,7);" class="btn btn-danger btn-block">OFF</button>
                        <button onclick="d7(1,7);" class="btn btn-info btn-block">ON</button>
                    </p>
                    </td>
                    <td width=170 style='width:127.6pt;border-top:none;border-left:none;
                    border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
                    padding:0cm 5.4pt 0cm 5.4pt;height:63.5pt'>
                    <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
                    text-align:center;line-height:normal'><span lang=IN style='font-size:16.0pt;
                    font-family:"Times New Roman",serif'>Ruang Makan
                        <h4 style="text-align: center" id="d6"></h4>
                        <button onclick="d6(0,6);" class="btn btn-danger btn-block">OFF</button>
                        <button onclick="d6(1,6);" class="btn btn-info btn-block">ON</button>
                    </span></p>
                    </td>
                    <td width=65 rowspan=3 style='width:48.7pt;border-top:none;border-left:none;
                    border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
                    padding:0cm 5.4pt 0cm 5.4pt;height:63.5pt'>
                    <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
                    text-align:center;line-height:normal'><span lang=IN style='font-size:16.0pt;
                    font-family:"Times New Roman",serif'>&nbsp;</span></p>
                    </td>
                    <td width=204 style='width:152.65pt;border-top:none;border-left:none;
                    border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
                    padding:0cm 5.4pt 0cm 5.4pt;height:63.5pt'>
                    <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
                    text-align:center;line-height:normal'><span lang=IN style='font-size:16.0pt;
                    font-family:"Times New Roman",serif'>Kamar Mandi
                        <h4 style="text-align: center" id="d5"></h4>
                        <button onclick="d5(0,5);" class="btn btn-danger btn-block">OFF</button>
                        <button onclick="d5(1,5);" class="btn btn-info btn-block">ON</button>
                    </span></p>
                    </td>
                    <td style='height:63.5pt;border:none' width=0 height=85></td>
                   </tr>
                   <tr style='height:69.85pt'>
                    <td width=368 colspan=2 style='width:276.3pt;border-top:none;border-left:
                    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
                    padding:0cm 5.4pt 0cm 5.4pt;height:69.85pt'>
                    <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
                    text-align:center;line-height:normal'><span lang=IN style='font-size:16.0pt;
                    font-family:"Times New Roman",serif'>Kamar 2
                        <h4 style="text-align: center" id="d8"></h4>
                        <button onclick="d8(0,8);" class="btn btn-danger btn-block">OFF</button>
                        <button onclick="d8(1,8);" class="btn btn-info btn-block">ON</button>
                    </span></p>
                    </td>
                    <td width=204 style='width:152.65pt;border-top:none;border-left:none;
                    border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
                    padding:0cm 5.4pt 0cm 5.4pt;height:69.85pt'>
                    <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
                    text-align:center;line-height:normal'><span lang=IN style='font-size:16.0pt;
                    font-family:"Times New Roman",serif'>Ruang Keluarga
                        <h4 style="text-align: center" id="d4"></h4>
                        <button onclick="d4(0,4);" class="btn btn-danger btn-block">OFF</button>
                        <button onclick="d4(1,4);" class="btn btn-info btn-block">ON</button>
                    </span></p>
                    </td>
                    <td style='height:69.85pt;border:none' width=0 height=93></td>
                   </tr>
                   <tr style='height:70.85pt'>
                    <td width=368 colspan=2 style='width:276.3pt;border-top:none;border-left:
                    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
                    padding:0cm 5.4pt 0cm 5.4pt;height:70.85pt'>
                    <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
                    text-align:center;line-height:normal'><span lang=IN style='font-size:16.0pt;
                    font-family:"Times New Roman",serif'>Kamar 1
                        <h4 style="text-align: center" id="d9"></h4>
                        <button onclick="d9(0,9);" class="btn btn-danger btn-block">OFF</button>
                        <button onclick="d9(1,9);" class="btn btn-info btn-block">ON</button>
                    </span></p>
                    </td>
                    <td width=204 style='width:152.65pt;border-top:none;border-left:none;
                    border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
                    padding:0cm 5.4pt 0cm 5.4pt;height:70.85pt'>
                    <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
                    text-align:center;line-height:normal'><span lang=IN style='font-size:16.0pt;
                    font-family:"Times New Roman",serif'>Ruang Tamu
                        <h4 style="text-align: center" id="d3"></h4>
                        <button onclick="d3(0,3);" class="btn btn-danger btn-block">OFF</button>
                        <button onclick="d3(1,3);" class="btn btn-info btn-block">ON</button>
                    </span></p>
                    </td>
                    <td style='height:70.85pt;border:none' width=0 height=94></td>
                   </tr>
                   <tr style='height:62.7pt'>
                    <td width=660 colspan=4 style='width:494.85pt;border:solid windowtext 1.0pt;
                    border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:62.7pt'>
                    <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
                    text-align:center;line-height:normal'><span lang=IN style='font-size:16.0pt;
                    font-family:"Times New Roman",serif'>&nbsp;</span></p>
                    </td>
                    <td width=204 style='width:152.65pt;border-top:none;border-left:none;
                    border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
                    padding:0cm 5.4pt 0cm 5.4pt;height:62.7pt'>
                    <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
                    text-align:center;line-height:normal'><span lang=IN style='font-size:16.0pt;
                    font-family:"Times New Roman",serif'>Teras
                        <h4 style="text-align: center" id="d2"></h4>
                        <button onclick="d2(0,2);" class="btn btn-danger btn-block">OFF</button>
                        <button onclick="d2(1,2);" class="btn btn-info btn-block">ON</button>
                    </span></p>
                    </td>
                    <td style='height:62.7pt;border:none' width=0 height=84></td>
                   </tr>
                  </table>

                  </div>

                  <p class=MsoNormal><span lang=IN style='font-size:16.0pt;line-height:107%;
                  font-family:"Times New Roman",serif'>&nbsp;</span></p>

                  <p class=MsoNormal style='margin-left:684.0pt;text-indent:36.0pt'><span
                  lang=IN style='font-size:16.0pt;line-height:107%;font-family:"Times New Roman",serif'>
                      <p><b>Lampu Jalan</b></p>
                        <h4 style="text-align: center" id="d16"></h4>
                        <button onclick="d16(0,16);" class="btn btn-danger">OFF</button>
                        <button onclick="d16(1,16);" class="btn btn-info">ON</button>
                  </span></p>

                </div>
            </div>

        {{-- </div> --}}
    </body>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script>
        var token = "d2811ee4c1c3400caffc57cd8c5f4e32";

        function d14(nilai, pin) {
            if(nilai == 1){
                document.getElementById("d14").innerHTML="Status ON";
            }else{
                document.getElementById("d14").innerHTML="Status OFF";
            }
            return axios.get('http://blynk-cloud.com/'+token+'/update/D'+pin+'?value='+nilai);
        }

        function d16(nilai, pin) {
            if(nilai == 1){
                document.getElementById("d16").innerHTML="Status ON";
            }else{
                document.getElementById("d16").innerHTML="Status OFF";
            }
            return axios.get('http://blynk-cloud.com/'+token+'/update/D'+pin+'?value='+nilai);
        }

        function d7(nilai, pin) {
            if(nilai == 1){
                document.getElementById("d7").innerHTML="Status ON";
            }else{
                document.getElementById("d7").innerHTML="Status OFF";
            }
            return axios.get('http://blynk-cloud.com/'+token+'/update/D'+pin+'?value='+nilai);
        }

        function d8(nilai, pin) {
            if(nilai == 1){
                document.getElementById("d8").innerHTML="Status ON";
            }else{
                document.getElementById("d8").innerHTML="Status OFF";
            }
            return axios.get('http://blynk-cloud.com/'+token+'/update/D'+pin+'?value='+nilai);
        }

        function d6(nilai, pin) {
            if(nilai == 1){
                document.getElementById("d6").innerHTML="Status ON";
            }else{
                document.getElementById("d6").innerHTML="Status OFF";
            }
            return axios.get('http://blynk-cloud.com/'+token+'/update/D'+pin+'?value='+nilai);
        }

        function d9(nilai, pin) {
            if(nilai == 1){
                document.getElementById("d9").innerHTML="Status ON";
            }else{
                document.getElementById("d9").innerHTML="Status OFF";
            }
            return axios.get('http://blynk-cloud.com/'+token+'/update/D'+pin+'?value='+nilai);
        }

        function d2(nilai, pin) {
            if(nilai == 1){
                document.getElementById("d2").innerHTML="Status ON";
            }else{
                document.getElementById("d2").innerHTML="Status OFF";
            }
            return axios.get('http://blynk-cloud.com/'+token+'/update/D'+pin+'?value='+nilai);
        }


        function d15(nilai, pin) {
            if(nilai == 1){
                document.getElementById("d15").innerHTML="Status ON";
            }else{
                document.getElementById("d15").innerHTML="Status OFF";
            }
            return axios.get('http://blynk-cloud.com/'+token+'/update/D'+pin+'?value='+nilai);
        }

        function d3(nilai, pin) {
            if(nilai == 1){
                document.getElementById("d3").innerHTML="Status ON";
            }else{
                document.getElementById("d3").innerHTML="Status OFF";
            }
            return axios.get('http://blynk-cloud.com/'+token+'/update/D'+pin+'?value='+nilai);
        }

        function d4(nilai, pin) {
            if(nilai == 1){
                document.getElementById("d4").innerHTML="Status ON";
            }else{
                document.getElementById("d4").innerHTML="Status OFF";
            }
            return axios.get('http://blynk-cloud.com/'+token+'/update/D'+pin+'?value='+nilai);
        }

        function d5(nilai, pin) {
            if(nilai == 1){
                document.getElementById("d5").innerHTML="Status ON";
            }else{
                document.getElementById("d5").innerHTML="Status OFF";
            }
            return axios.get('http://blynk-cloud.com/'+token+'/update/D'+pin+'?value='+nilai);
        }
    </script>
</html>
