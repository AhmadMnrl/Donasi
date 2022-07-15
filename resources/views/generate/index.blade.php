@extends('layouts.master')
@section('css-generate')

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

@endsection
@section('content')

 <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12 mt-2">
        <div class="mdc-card p-0">
            <div class="row">
                <div class="col-lg-10">

                    <select class="form-select my-5 ms-4" aria-label="Default select example" id="select-yayasan">
                        <option value="">Pilih yayasan untuk generate</option>
                        @foreach ($yayasan as $value)
                            <option value="{{$value->id}}">{{ $value->nama_lengkap }}</option>
                        @endforeach
                        <?php $dataId = 0 ?>

                        {{-- <option <?= $dataId = "value='".$dataId."'"; ?> id="set-id-generator" style="display: none"></option> --}}
                    </select>
                        <script>

                            $(function(){
                                $("#btn-generate").click(function() {
                                   // alert($("#select-yayasan option:selected").value);
                                    if($("#select-yayasan option:selected").val() == "")
                                        alert("Pilih Yayasan");
                                    else {
                                        $.ajax({
                                            url: "get-qr/" + $("#select-yayasan option:selected").val() ,
                                            dataType: "html",
                                            success : function(data) {
                                                console.log(data);
                                                $("#qr-wrapper").html(data);
                                            }
                                        });
                                    }

                                })
                            });


                        </script>
                </div>
                <div class="col-lg-2">
                    <button class="btn btn-primary my-5 ms-3" id="btn-generate">Generate</button>
                </div>

            </div>
            <div id="qr-wrapper">

            </div>
             <button class="btn btn-primary my-5 ms-3" >Cetak</button>

        </div>
 </div>

@endsection
@section('js-generate')
    {{-- <script>

        let selectYayasan = document.querySelector('#select-yayasan');
        let btnGenerate = document.querySelector('#btn-generate');
        let textGenerator = document.querySelector('#text-generate');

        let valueId = '';
        let valueContent = '';

        selectYayasan.addEventListener('change', (event) => {
            valueId = event.target.value;
            valueContent = selectYayasan.options[selectYayasan.selectedIndex].text;

            textGenerator.innerText = valueContent;
            // document.querySelector('#set-id-generator').value = valueId;
            console.log(valueId, valueContent);
        });

        btnGenerate.addEventListener('click', () => {
            window.print();
        })


    </script> --}}
@endsection

<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
