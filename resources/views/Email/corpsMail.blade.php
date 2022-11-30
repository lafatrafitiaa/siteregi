<!DOCTYPE html>
<html>
<head>
    <title>Demande Devis</title>
</head>
<body>


     <h3>Client: {{ $details['client'] }}</h3>
    <p>Demande devis sur:{{ $details['subject'] }}</p>

    <?php if ($details['produit']!=""){  ?>
        <p>Produit demandé : {{$details['produit']}} </p>
    <?php } ?>

    <?php if ($details['modele']!=""){  ?>
     <p>Modele: {{ $details['modele']}}</p>
     <?php } ?>
     <?php if ($details['puissance']!=""){  ?>
     <p>puissance: {{ $details['puissance']}}</p>
     <?php } ?>
     <?php if ($details['phase']!=""){  ?>
     <p>phase: {{ $details['phase']}}</p>
     <?php } ?>
    <?php if ($details['frequence']!=""){  ?>
        <p>Frequence : {{$details['frequence']}} </p>
    <?php } ?>
    <?php if ($details['description']!=""){  ?>
        <p>Description : {{$details['description']}} </p>
    <?php } ?>
    <p>Materiel à protéger: {{$details['materiel']}} </p>
    <p>Remarque du client : {{$details['remarque']}} </p>

    <p>Cordialement,</p>
    <p>__________________</p>
    <p>Regitech OI</p>
    <p>II W 19G, Antsakaviro 101 Antananarivo Madagascar</p>
    <p>+261 32 12 710 00</p>
    <p>Contact@regitech-oi.com</p>
</body>
</html>
