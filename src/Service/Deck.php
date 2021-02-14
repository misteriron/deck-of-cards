<?php

namespace App\Service;

class Deck
{
    // Tableau comprenant toutes les cartes du jeu
    private $deck;
    // Tableau comprenant la main du joueur
    private $hand;
    private $suits;
    private $values;

    public function __construct()
    {
        // Tableau qui va contenir le deck de cartes
        $this->deck = [];
        // Tableau qui va contenir la main du joueur
        $this->hand = [];
        // L'enseigne des cartes qui va nous permettre de faire le tri selon la "force" des couleurs
        // On utilise les noms des cartes en anglais pour pouvoir utiliser les symboles html correspondant.
        $this->suits = ['diams', 'hearts', 'spades', 'clubs'];
        $this->values = ['A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'V', 'D', 'R'];
        // id de la carte de 1 à 52 dans un jeu standard
        $id = 1;

        // On créé le jeu de cartes
        foreach ($this->suits as $suit) {
            foreach ($this->values as $value) {
                $this->deck[] = new Card($id, $suit, $value);
                $id++;
            }
        }
    }

    /**
     * Mélange le deck de cartes
     */
    public function shuffle()
    {
        shuffle($this->deck);
    }

    /**
     * Distribue les cartes au joueur, créé sa main
     * @param $numberOfCardsToDeal
     */
    public function dealCards($numberOfCardsToDeal)
    {
        for ($i = 0; $i < $numberOfCardsToDeal; $i++) {
            $this->hand[] = $this->deck[$i];
        }
    }

    /**
     * Montre la main de cartes
     * Le tableau renverra l'id, l'enseigne et la valeur des cartes.
     * @return array
     */
    public function showHand(): array
    {
        $returnArr = [];
        $len = count($this->hand);
        for ($i = 0; $i < $len; $i++) {
            $returnArr[$i]['id'] = $this->hand[$i]->getId();
            $returnArr[$i]['suit'] = $this->hand[$i]->getSuit();
            $returnArr[$i]['value'] = $this->hand[$i]->getValue();
        }
        return $returnArr;
    }

    /**
     * Tri les cartes selon la valeur
     * @return array
     */
    public function sortBySuit(): array
    {
        sort($this->hand);
        return $this->hand;
    }
}
