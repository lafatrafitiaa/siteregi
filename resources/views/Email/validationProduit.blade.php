<!DOCTYPE html>
<html>
<head>
    <title>Demande Devis</title>
</head>
<body>

    <h3> Validation du produit : {{ $details['subject'] }} </h3>

    <p>Votre commande a été valider.</p>
    <p>Commandé le: {{ $details['datecommande'] }} </p>
    <p>Avec une puissance de: {{ $details['puissande'] }} et un prix de: {{ $details['prix'] }}Ar </p>

    <p>Cordialement,</p>
    <p>__________________</p>
    <p>Regitech OI</p>
    <p>II W 19G, Antsakaviro 101 Antananarivo Madagascar</p>
    <p>+261 32 12 710 00</p>
    <p>Contact@regitech-oi.com</p>
</body>
</html>
