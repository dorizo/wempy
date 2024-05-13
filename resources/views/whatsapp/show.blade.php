@extends('layouts.admin')

@section('content')

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Tambah {{Route::current()->getName()}} </h4>
                  </div>
                  <div class="card-body">
                    <div class="hero bg-primary text-white">
                        <div class="hero-inner">
                          @if($run=="on")
                        <a href="{{Request::url()}}?run=off"><div class="alert alert-success">Whatsapp  ON<br /> untuk menjalankan fungsi ini applikasi harus stand by di browser</div></a>
                         @else
                         <a target="_BLANK" href="{{URL::to('whatsapp/run/'.$single->whatsappCode)}}"><div class="alert alert-danger">Whatsapp  OFF</div></a>

                         
                          @endif
                            <h2> {{$single->whatsappName}}</h2>
                            <p class="lead"> {{$single->WhatsappDesc}}</p>
                        </div>
                      
                        @if($run!="on")
                        <script>
                        async  function loadDoc()  {
                          const response = await fetch("{{URL::to('api/member/').'/'.$single->whatsappCode}}");
                          const movies = await response.json();
                          var htmltext = "";
                           movies.forEach(row => {
                           console.log(row);
                            htmltext += "<tr><td>"+row.nama_lengkap+"</td><td>"+row.telp+"</td><td>"+row.whatsappdetailCode+"</td><td><button onclick='setdata("+row.memberCode+")'>add</button></td></tr>";
                          });
                          console.log(htmltext);
                          $("#table1").find('tbody').empty();
                            $("#table1").find('tbody').append(htmltext);
                        }
                        loadDoc();

                        function setdata($id){
                        $.post('{{URL::to("whatsapp/submitdetail")}}',
                          {
                              '_token': $('meta[name=csrf-token]').attr('content'),
                              memberCode: $id,
                              whatsappCode: {{$single->whatsappCode}},
                              whatsappdetailstatus : "pending",
                          }, function(response){
                            console.log(response);
                            loadDoc();
                          });
                        
                        }

                        </script>
                        <table class="table" id="table1">
                          <thead><th>NAMA</th><th>MODE</th><th>ID TRANSAKSI</th><th>Status</th></thead>
                          <tbody></tbody>
                        </table>
                        @else
                        <script>
                        async  function loadDoc()  {
                          const response = await fetch("{{URL::to('api/runwa/').'/'.$single->whatsappCode}}");
                          const movies = await response.json();
                          var htmltext = "";
                           movies.forEach(row => {
                            htmltext += "<tr><td>"+row.nama_lengkap+"</td><td>"+row.telp+"</td><td>"+row.whatsappdetailCode+"</td><td><button class='btn btn-success'>"+row.status+"</button></td></tr>";
                          });
                          console.log(htmltext);
                          $("#table1").find('tbody').empty();
                          $("#table1").find('tbody').append(htmltext);
                        }
                        loadDoc();
                        async function printFiles () {
                          
                          const response = await fetch("{{URL::to('api/runwa/').'/'.$single->whatsappCode}}");
                          const movies = await response.json();
                         
                          for (const file of movies) {
                            const response = await fetch("{{URL::to('api/sendwa/').'/'}}"+file.memberCode+"/"+file.whatsappdetailCode);
                            
                            console.log(response.statusText);
                            $(".dorizooo").html(response.statusText);
                            await delay(1000);
                            
                          $(".dorizooo").html("proses");
                            await delay(1000);
                          }
                        }
                        
                        printFiles();
                        async function delay(ms) {
                          // return await for better async stack trace support in case of errors.
                          return await new Promise(resolve => setTimeout(resolve, ms));
                        }
                        

                        
                        </script>
                        <div class="dorizooo alert alert-success h3">Proses</div>
                        <table class="table" id="table1">
                          <thead><th>NAMA</th><th>MODE</th><th>ID TRANSAKSI</th><th>Status</th></thead>
                          <tbody></tbody>
                        </table>
                        @endif
                    </div>
                    
              </div>
            </div>

@endsection