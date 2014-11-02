<?php

namespace FJL\ChargifyBundle\Model;

interface ResourceInterface
{
    public function getArrayCopy();
    public function populate(array $data);
}