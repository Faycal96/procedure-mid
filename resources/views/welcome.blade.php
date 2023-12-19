@extends('layouts/layoutW')
@section('contenuWelcome')


        <!-- ======= Hero Section ======= -->

        <!-- End Hero -->

        <!-- ======= Breadcrumbs ======= -->
        <!-- End Breadcrumbs -->

        <!-- ======= sidebar Section ======= -->
            <div class="container">

                    <div class="col">

                        <div class="row">

                            @foreach($procedure as $proc)
                            {{-- {{ dd($procedure->baseJuridique )}} --}}
                            <div class="col-lg col-md mb20">
                                <div class="mb-4">

                                    <div class="" style="width:14rem; border:none; text-align:left; display:inline">
                                        <div class="" style="height : 180px">
                                            <img src="{{asset($proc->img)}}" class="" alt="..." width="100%" height="100%" >
                                        </div>

                                        <!-- <h6 > -->
                                            <a title="" href="/{{$proc->code}}" class="" >
                                                <div class="proc_text rounded" style="background-color: {{$proc->code_color}}; height:90px;">
                                                    {{ $proc->libelle_long }}
                                                </div>
                                            </a>
                                            <!-- </h6> -->
                                            {{-- <a href="" style="align-items:center;" class="btn btn-primary   btn-sm">voir plus</a> --}}

                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>

                    </div>
            </div>


        <!-- End Contact Section -->

@endsection
