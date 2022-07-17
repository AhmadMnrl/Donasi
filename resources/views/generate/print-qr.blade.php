<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    /*
            #qr-generator {
                display: none
            } */

            @media print {
                #hide-generator-side {
                    display: none;
                }

                #hide-generator-top {
                    display: none;
                }

                #select-yayasan {
                    display: none;
                }

                #btn-generate {
                    display: none;
                }

                #qr-generator {
                    display: block;
                }


                #qr-generator svg{
                    width: 500px;
                    height: 500px;
                    margin-top: 50px;
                }

                #qr-generator p {
                    font-size: 30px;
                    margin: 40px 0;
                }
            }

        </style>

</head>
<body>
<div class="visible-print text-center" id="qr-generator">
    <div><h5>{{$yayasan->nama_lengkap}}</h5></div>
    <div>Phone : {{$yayasan->no_tlp}}</div>
    <div>Email : {{$yayasan->email}}</div>
    <div>address : {{$yayasan->address}}</div>
    <div class="mt-2">{{ QrCode::size(100)->generate("http://web-donasi.ilumni.id/qr-donasi?id=" . $yayasan->id) }}</div>
</div>
</body>
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous">
</script>
</html>
