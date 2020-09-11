@extends('base')
@section('main')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br><br>

    <section class="content">
            <table style="text-align:center">
            <tr>
            <td><img src="{{ URL::to('/') }}/img/logo.jpg" alt="Logo" width="110" height="110"></td>
            <td><h3>Contrat de Location de voiture</h3></td>
            </tr>
            </table>
                <form method="get" action="" style="width:70%; margin-left:15%;">
                    {{ csrf_field() }}
                    
                    <div class="card">
                      <div class="card-header">
                              <table width="500px">
                                <tr>
                                  <td><label>Réf: {{ $booking->id }}</label></td>
                                  <td><label>Montant: {{ $price }} dt</label></td>
                                </tr>
                                <tr>
                                    <td><label>De: {{ $booking->pick_up_date }}</label></td>
                                    <td> <label>à: {{ $booking->drop_off_date }}</label></td>
                                </tr>  
                              </table>
                      </div>
                      <div class="card-body">
                       <h5 class="card-title"> Vos informations</h5>
                       <br/> 
                        <table class="card-text" width="500px">
                                <tr>
                                  <td><label>Mr/Mme: {{ $user->name}}</label></td>
                                  <td><label>Cin: {{ $user->cin }}</label></td>
                                </tr>
                                <tr>
                                    <td><label>E-mail: {{ $user->email }}</label></td>
                                    <td> <label>Tel: {{ $user->phone }}</label></td>
                                </tr> 
                                <tr>
                                    <td style="text-align:center"><label>Adresse: {{ $user->adress }}</label></td>
                                </tr> 
                        </table>
                        <br/> 
                        <h5 class="card-title"> Voiture louée</h5> 
                        <br/> <br/> 
                        <table class="card-text" width="500px">
                                <tr>
                                  <td><label>Car Number: {{ $booking->carNumber}}</label></td>
                                  <td><label>Category: {{ $car->category }}</label></td>
                                </tr>
                                <tr>
                                    <td><label>Color: {{ $car->color }}</label></td>
                                    <td> <label>Prce Per Day : {{ $car->pricePerDay }} Dt </label></td>
                                </tr> 
                                <tr>
                                    <td><label>About: {{ $car->capacity}}ch</label></td>
                                </tr> 
                        </table>
                      </div>
                      <div class="card-footer text-muted" style="text-align:center">
                         
                            <button style="cursor:pointer" type="submit" class="btn btn-primary">Imprimer</button>
                          
                      </div>
                    </div> 
                </form>
                
    </section>
    </div>


@endsection