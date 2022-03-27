<?php

class ParcelFabric
{
    private DeliveryComp $payload;
public function makeParcel ($company): DeliveryComp
{
   switch ($company) {
       case 'Быстрая':
           $this->payload = new FastCompConnect(fast_comp_addr);
           break;
       case 'Медленная':
           $this->payload = new SlowCompConnect(slow_comp_addr);
           break;
   }
   return $this->payload;
}
}