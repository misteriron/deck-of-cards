<?php

namespace App\Service;

class Card
{
    // Id de la carte, dans un jeu de 52 cartes, l'As de carreau aura l'id 1 et
    // le Roi de trèfle aura l'id 52.
    private $id;
    // L'enseigne de la carte, l'ordre de force des couleurs pour le tri est :
    //  - carreau
    //  - coeur
    //  - pique
    //  - trefle
    private $suit;
    // La valeur de la carte, As est le plus petit pour le tri et le Roi le plus grand.
    private $value;

    /**
     * @param int $id
     * @param string $suit
     * @param string $value
     */
    public function __construct($id, $suit, $value)
    {
        $this->id = $id;
        $this->suit = $suit;
        $this->value = $value;
    }

    /**
     * Renvoie l'id de la carte
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Renvoie l'enseigne de la carte (carreaux, coeur, pique, trefle)
     * @return string
     */
    public function getSuit(): string
    {
        return $this->suit;
    }

    /**
     * Renvoie la valeur de la carte
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}
