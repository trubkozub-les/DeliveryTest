<?php

class FastCompConnect implements DeliveryComp
{
    private string $base_url;
    private string $sourceKladr;
    private string $targetKladr;
    private float $weight;
    private float $price;
    private int $period;
    private string $error;

    public function __construct($url)
    {
        $this->base_url = $url;
    }

    public function setWeight($weight): void
    {
        $this->weight = $weight;
    }

    public function setTarget(string $target): void
    {
        $this->targetKladr = $target;
    }

    public function setSource(string $source): void
    {
        $this->sourceKladr = $source;
    }

    public function makeRequest(): void
    {
        $this->get_data();
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getDate(): string
    {
        return date('Y-m-d', time() + 86400 * $this->period);
    }

    public function getError(): string
    {
        return $this->error;
    }

    private function get_data(){
        $post_data = [
            'source' => $this->sourceKladr,
            'target' => $this->targetKladr,
            'weight' => $this->weight,
        ];

        $post_data = http_build_query($post_data);

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_VERBOSE, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($curl, CURLOPT_URL, $this->base_url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt ($curl, CURLOPT_COOKIE, 'XDEBUG_SESSION=1');

        $result = curl_exec($curl);
        $result= json_decode($result, true);
        $this->price = $result['price'];
        $this->period = $result['period'];
        $this->error = $result['error'];
    }
}