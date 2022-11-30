
@extends('TemplateFormulaire')

@section('formulaire')
    <section id="contact" >
        <div class="container"style="padding: 5%;">
            <div class="heading">
                <h2><span>Inscription</span></h2>
                <div class="line"></div>
                <p><span><strong></strong></span> </p>
            </div>
            <div class="text-center">
                <div class="col-md-12 ">
                    <form id="main-contact-form" name="inscription" method="post" action="{{route('inscription')}}">
                    {{ csrf_field() }}
                    <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label style="color: white" for="puissance">Nom</label>
                                    <input type="text" id="nom" name="nom" class="form-control"  required="required">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label style="color: white" for="puissance">Email</label>
                                    <input type="email" name="email" class="form-control"  required="required">
                                </div>
                            </div>
                    </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label style="color: white" for="puissance">Tel</label>
                                    <input type="phone" name="tel" class="form-control"  required="required">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label style="color: white" for="puissance">Mot de passe</label>
                                    <input type="password" name="mdp" class="form-control"  required="required">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label style="color: white" for="puissance">Societe</label>
                                    <input type="text" name="societe" class="form-control"  >
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label style="color: white" for="puissance">Activite</label>
                                    <input type="text" name="activite" class="form-control"  >
                                </div>
                            </div>
                        </div>
                        <?php if(isset($prod['errorInscription'])){?>
                            <div class="col-md-8">
                            <h5 style="color:red;"><?php echo $prod['errorInscription']; ?></h5>
                            </div>
                        <?php } ?>
                    {{-- <a href="javascript:submitForm()" class="btn-send col-md-8 col-sm-12 col-xs-12" type="submit"> Envoyer </a>
                    --}}
                        <button type="submit" class="btn btn-success btn-sm">Envoyer</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
