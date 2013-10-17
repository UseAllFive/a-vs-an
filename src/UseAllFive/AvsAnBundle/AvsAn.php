<?php

namespace UseAllFive\AvsAnBundle;

use UseAllFive\AvsAnBundle\Interfaces\DictionaryInterface;

class AvsAn
{
    protected $dictionary;

    public function __construct(DictionaryInterface $dictionary)
    {
        $this->dictionary = $dictionary->getDictionary();
    }

    public function query($word)
    {
        $node = $this->dictionary;
        $data = (isset($node['data'])) ? $node['data'] : null;
        $sI = 0;
        $wordLength = strlen($word);

        while (1) {
            if ($sI >= $wordLength) {
                return $data;
            } else if ($word[$sI] === "(" || $word[$sI] === "'" || $word[$sI] === '"') {
                $sI++;
            } else {
                break;
            }
        }

        while (1) {
            if (isset($node[$word[$sI]])) {
                $node = $node[$word[$sI]];
            } else {
                break;
            }

            if (isset($node['data'])) {
                $data = $node['data'];
            }

            if (++$sI >= $wordLength) {
                if (isset($node[" "]['data'])) {
                    $data = $node[" "]['data'];
                }
                break;
            }
        }

        return $data;
    }
}
