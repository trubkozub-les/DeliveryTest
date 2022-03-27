<?php
interface DeliveryComp
{
    public function setWeight(float $weight): void;
    public function setTarget(string $target): void;
    public function setSource(string $source): void;
    public function makeRequest(): void;
    public function getPrice(): float;
    public function getDate(): string;
    public function getError(): string;
}